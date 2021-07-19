<?php


namespace Module\JWT\Controller;


use App\Helper\Submitter;
use Illuminate\Http\Request;
use Module\JWT\JWT;
use Module\JWT\Model\Role;
use Module\JWT\Model\User;
use Module\JWT\Model\UserComment;
use function compact;
use function validate;
use function view;


class AdminProfileController
{

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return template("dashboard")->blank(view('user.edit', ["edit_user" => $user, "roles" => Role::all()]), ['subtitle' => "ویرایش پروفایل کاربر"]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        validate($request->all(), [
            User::NAME => ['nullable', 'string', 'min:3', 'max:255'],
            User::FAMILY => ['nullable', 'string', 'min:3', 'max:255'],
            User::CITY => ['nullable', 'string', 'min:3', 'max:255'],
            User::COUNTRY => ['nullable', 'string', 'min:3', 'max:255'],
            User::ADDRESS => ['nullable', 'string', 'min:0', 'max:9999'],
            User::EMAIL => ['nullable', 'string', 'min:1', 'max:255', 'regex:/^.+@.+$/i'],
            User::PHONE => ['required', 'regex:/[0-9]{10}/', 'digits:11', 'unique:users,phone,' . $id],
            User::PASSWORD => ['nullable', 'string', 'min:8', 'confirmed'],
            User::ROLE_ID => ['nullable', 'integer', 'exists:roles,id']
        ]);
        $user->update($request->except("site"));
        $user->role_id = $request->role_id;
        User::handleMeta($user, $request);
        $user->save();
        return Submitter::swalRedirect("با موفقیت ذخیره شد.", "users", "success");

    }


    public function index(Request $request)
    {
        $users = User::where([
                [User::PHONE, "like", "%{$request->input("phone")}%"],
            ]
        )->with("role", "metas")->orderBy('id', 'DESC')->limit(200)->get();

        return view('user.index', compact("users"));
//        return template("dashboard")->blank(view('user.index', ["users" => User::with("role", "metas")->orderBy('id', 'DESC')->get()]),['subtitle'=>"لیست کاربران"]);
    }

    public function create()
    {
        return template("dashboard")->blank(view('user.create', ["roles" => Role::all()]), ['subtitle' => ""]);
    }

    public function loginAsUser($id)
    {
        $user = User::findOrFail($id);
        $old_id = JWT::getUser()->token;

        JWT::unsetSessionUser();
        /*
        * Set Session For Dashboard
        */
        JWT::setSessionUser($user);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            unset($_COOKIE['old_id']);
            setcookie('old_id', null, -1, '/');
            return redirect(url('dashboard'));
        } else {
            setcookie('old_id', $old_id, time() + 1296015, "/");
        }
        return Submitter::toastRedirect(
            "ورود با موفقیت انجام شد",
            "dashboard",
            "success",
            compact("user"));
    }

    public function subUsers($id)
    {
        $user = User::findOrFail($id);
        if ($user->role_id == Role::MARKETER)
            $users = User::where(User::PARENT_ID, $id)->get();
        elseif ($user->role_id == Role::SALE_MANAGER)
            $users = User::where([[User::PARENT_ID, $id], [User::ROLE_ID, Role::MARKETER]])->get();
        else
            $users = [];
        return template("dashboard")->blank(view('user.sub-users', ["users" => $users]), ['subtitle' => "لیست زیر مجموعه ها"]);
    }

    public function roleUpdate(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->update([User::ROLE_ID => $request->role_id]);
        return redirect("users");
    }

    public function getComment(Request $request)
    {
        validate($request->all(), [
            "user_id" => ["required"]
        ]);

        $order = User::with("comments.user")->findOrFail($request->input("user_id"));

        return $order->comments;
    }

    public function setComment(Request $request)
    {
        validate($request->all(), [
            UserComment::COMMENT => ["required"],
            UserComment::USER_ID => ["required"]
        ]);

        $user = User::findOrFail($request->input("user_id"));

        UserComment::create([
            UserComment::USER_ID => $user->id,
            UserComment::SENDER => JWT::getUser()->id,
            UserComment::COMMENT => $request->input("comment"),
        ]);

        return Submitter::toastRedirect("کامنت شما با موفقیت ثبت شد.", route("crm.users"));
    }
}
