<?php


namespace Module\JWT\Controller;


use App\Helper\Event;
use App\Helper\Submitter;
use Illuminate\Http\Request;
use Module\JWT\JWT;
use Module\JWT\Model\User;
use function validate;
use function view;

class ProfileController
{
    public function __construct()
    {
    }

    public function index()
    {
        //$user = JWT::getUser();
        //no need  to pass fro user but pass it for admin
        return template("dashboard")->blank(view("profile"), ['subtitle' => "پروفایل کاربر"]);
    }

    public function update(Request $request)
    {
        $user = JWT::getUser();
        $fields = $request->all([User::NAME, User::SITE, User::SLUG, User::FAMILY, User::CITY, User::COUNTRY, User::ADDRESS, User::EMAIL]);
        $fields['site'] != "" ?: $fields['site'] = null;
        validate($fields, [
            User::NAME => ['required', 'string', 'min:3', 'max:255'],
            User::SITE => ['nullable', 'string', 'min:3', 'max:255', 'unique:users,site,' . $user->id],
            User::FAMILY => ['nullable', 'string', 'min:3', 'max:255'],
            User::CITY => ['nullable', 'string', 'min:3', 'max:255'],
            User::COUNTRY => ['nullable', 'string', 'min:3', 'max:255'],
            User::ADDRESS => ['nullable', 'string', 'min:0', 'max:9999'],
            User::EMAIL => ['nullable', 'string', 'min:1', 'max:255', 'regex:/^.+@.+$/i'],
        ]);

//        if (User::where(User::SLUG, $request->slug)->where(User::ID, "!=", $user->id)->exists())
//            return Submitter::error("نامک تکراری است");
//


        User::handleMeta($user, $request);

        $user->update($fields);
        //save none fillable fields
//        if ($request->password) {
//            $user->setPassword($request->password);
//        }
        //image relation
        Event::listen('user.update' ,$user,$request);

        //todo fix redirect path
        return Submitter::swalRedirect("با موفقیت ذخیره شد .", "user/profile", "success");

    }

//    public function orders()
//    {
//      $user = JWT::getUser();
//        $orders = $user->orders;
//        return view('orders.index');
//
//    }
}