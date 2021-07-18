<?php


namespace Module\JWT\Controller;


use App\Helper\Event;
use App\Helper\Submitter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Module\JWT\{JWT, Model\User};
use Module\Kavenegar\Kavenegar;
use Module\SocialMarket\Whitelabel;


class  UserApiController
{
    /**
     * Get user data
     * @return User|null
     */
    public function get()
    {
        return JWT::getUser()->withRole();
    }

//    /**
//     * Get user role
//     * @return Role
//     */
//    public function role()
//    {
//        return JWT::getUser()->role();
//    }
//
//    public function phoneRegister(Request $request)
//    {
//        //Validate Request
//        validate($request->all(), ["phone" => "required|size:11"]);
//        if (User::where(User::PHONE, $request->input("phone"))->exists())
//            return Submitter::error("Phone is Exists");
//        $user = User::create([User::ROLE_ID => 2, User::PHONE => $request->input("phone"),
//            User::TOKEN => uniqid(User::TOKEN_PREFIX)]);
//        $user->sendVerifyCode();
//        $registerCode = uniqid();
//        $user->metas()->create([Meta::KEY => "registerCode", Meta::VALUE => $registerCode]);
//        return Submitter::swalRedirect("Register Successful", "", "success", ["register_code" => $registerCode]);
//    }
//
//    public function phoneRegisterResume(Request $request)
//    {
//        validate($request->all(), ["register_code" => "required", "verify_code" => "required", "password" => "required"]);
//        $meta = Meta::getMeta("registerCode", $request->input("register_code"), User::class);
//        if (!$meta)
//            return Submitter::error("Wrong Request");
//        /**
//         * @var User $user
//         */
//        $user = $meta->metaable;
//        if (!$user->verify($request->input("verify_code")))
//            return Submitter::error("Wrong Verify Code");
//
//        /*
//         * Set Password
//         */
//        $user->setPassword($request->input("password"));
//
//        return ["status" => true, "user" => $user];
//    }
//
//    public function login(Request $request)
//    {
//        //Validate Request
//        validate($request->all(), ["password" => "required", "email" => "required_if:phone,null|email", "phone:required_if:email,null"]);
//        $email = $request->input("email");
//        $phone = $request->input("phone");
//        $user = User::login($phone ? $phone : $email, sha1($request->input("password")));
//        if (!$user)
//            return Submitter::error(__("jwt.wrongEmailOrPassword", "Wrong Email Or Phone Or Password"));
//
//        /*
//         * If Two Step Login Is Active
//         */
//        if ($user->twoFactorIsActive()) {
//            $user->sendVerifyCode();
//            return (new Submitter(true, "Two Factor Sms Send"))->setDataAttribute(["twoFactor" => true])->send();
//        }
//
//        /*
//         * Set Session for Web users
//         */
//        !$request->input("session") ?: JWT::setSessionUser($user);
//
//        /*
//         * Make Visible Hidden Fields in Json
//         */
//        $user->makeVisible([User::TOKEN, User::PHONE, User::EMAIL, User::CREDIT, User::ADDRESS]);
//
//        return (new Submitter(true, __("jwt.SuccessfulLogin", "Login Successful")))->setDataAttribute($user)->actionAlert("swal", $request->input("redirect"), "success")->send();
//
//    }
//
//    public function verifyPhoneLogin(Request $request)
//    {
//        //Validate Request
//        validate($request->all(), ["phone" => "required", "code" => ["required", "integer", "size:5"]]);
//
//        $user = User::where(User::PHONE, $request->input("phone"))
//            ->where(User::VERIFY_CODE, $request->input("code"))
//            ->first();
//
//        if (!$user)
//            return Submitter::error(__("jwt.wrongPhone", "Wrong Phone"));
//
//        $user->update([User::VERIFY_CODE => null]);
//
//        /*
//        * Set Session for Web users
//        */
//        !$request->input("session") ?: JWT::setSessionUser($user);
//
//        /*
//         * Make Visible Hidden Fields in Json
//         */
//        $user->makeVisible([User::TOKEN, User::PHONE, User::EMAIL, User::CREDIT, User::ADDRESS]);
//
//        return (new Submitter(true, __("jwt.SuccessfulLogin", "Login Successful")))
//            ->setDataAttribute($user)
//            ->actionAlert("toastr", $request->input("redirect"), "success")
//            ->send();
//    }

    public function auth(Request $request)
    {
        validate($request->all(), ["phone" => ["required"]]);
        $phone = preg_replace("/[^0-9]/", '', JWT::changeFaNumsToEn($request->input("phone")));
        if (strlen($phone) != 11)
            return Submitter::error(" شماره شما صحیح نمی‌باشد.");
        /*
         * Check Login Or Register
         */
        $register = false;
        $user = User::where(User::PHONE, $phone)->where(User::PARENT_ID, User::$defaultParentId)->first();
        /*
         * If User Not Exists
         */
        if (!$user) {
            $user = User::create([
                User::PHONE => $phone,
                User::PASSWORD => sha1(rand(10000, 99999)),
                User::ROLE_ID => User::$defaultRoleId,
                User::TOKEN => uniqid(User::TOKEN_PREFIX)
            ]);
//            if (User::$defaultRoleId == 6)
//                (new Kavenegar())->lookUp($user->phone, "whitelabel-create", "شما");
            $user->setParent(User::$defaultParentId);
            $user->setMeta("registerType", @$request->input("type") ? $request->input("type") : "Guest");
            $register = true;

            Event::listen("user.register",$user);
        }

        $user->sendVerifyCode();
//            return (new Submitter(false, "-"))->setDataAttribute(["register" => $register])->setMode("toastr")->send(true);
        $user->save();
        return (new Submitter(true, "لطفا تلفن همراه خود را تایید نمایید"))->setDataAttribute(["register" => $register])->setMode("toastr")->send(true);
    }

    public function verify(Request $request)
    {
        validate($request->all(), ["phone" => ["required"], "code" => ["required"]]);

        $phone = preg_replace("/[^0-9]/", '', JWT::changeFaNumsToEn($request->input("phone")));
        $code = preg_replace("/[^0-9]/", '', JWT::changeFaNumsToEn($request->input("code")));
        if (strlen($phone) != 11 or strlen($code) != 3)
            return Submitter::error("فرمت تلفن همراه یا کد تایید صحیح نمی باشد");


        $user = User::where(User::STATUS, User::VERIFY)
            ->where(User::PHONE, $phone)
            ->where(User::PARENT_ID, User::$defaultParentId)
            ->first();
        if (!$user)
            return Submitter::error("درخواست اشتباه است", null, true);
        if (!$user->verify($code))
            return Submitter::error("کد تایید صحیح نیست", null, true);

        /*
         * Set Session For Dashboard
         */
        JWT::setSessionUser($user);

        /*
         * Send Welcome Sms for New Users
         */
//        if (Carbon::now("Asia/Tehran")->diffInMinutes($user->created_at) <= 3)
//            (new Kavenegar())->lookUp($phone, Kavenegar::SIGNUP, "پشتیبانی");


        $user->makeVisible([User::TOKEN, User::PHONE, User::CREDIT]);

        if ($request->first_page and $user->parent_id) {
            $url = url($user->parent->slug);
            return (new Submitter(true, "
مشاور تبلیغاتی شما اقا/خانم {$user->parent->full_name} میباشد 
<br>
شماره تماس مشاور :{$user->parent->phone}
<br>
برای سفارش خدمات فالوگت روی دکمه زیر کلیک کنید :
<br>
<a class='btn btn-info mt-3 rounded' href='{$url}'>سفارش خدمات شبکه های های اجتماعی</a>
"))->setDataAttribute(["hide" => true])->send();
        }

        return Submitter::toastRedirect("ورود با موفقیت انجام شد", "dashboard", "success", $user, true);
    }
}