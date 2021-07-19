<?php


namespace Module\JWT;


use App\Exception\V8Exception;
use App\Helper\View\Footer;
use Core\App;
use eftec\bladeone\BladeOne;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Module\JWT\Model\Role;
use Module\JWT\Model\Test;
use Illuminate\Routing\{PendingResourceRegistration, Route};
use Module\JWT\Middleware\{ApiAuthenticate, Can, WebAuthenticate};
use Module\JWT\Model\User;
use function menu;

require_once __DIR__ . "/vendor/autoload.php";

/**
 * Class JWT
 * @package Module\JWT
 */
final class JWT
{
    const USER = "user";

    public static string $verifyOtpTemplate = "auth";

    private static ?User $user;
    private static ?string $cookie;
    private static bool $setCookie = false;

    public function __construct()
    {
        menu("users", "کل کاربران", "", "", "admin.users", "icon-people", 8);
        menu("users.list", "مدیریت کاربران", 'users', "users", "admin.users");
        menu("profile.profile", "پروفایل", 'user/profile', "", null, "icon-people", 8);
        menu("role", "نقش ها", route("role.index"), "", "admin.roles", "fa fa-hand-paper-o");
//        menu("role.list", "وظایف", "role", "admin.roles", "fa fa-hand-paper-o");
        $this->bindUser();
        $this->middlewares();

        V8Exception::handle("route.invalid", function () {
            echo view("abort");
            die();
        });
    }

    public static function onActivate()
    {
        self::tables();
        self::roles();
    }

    /**
     * Bind Active User To All Views
     */
    private function bindUser()
    {
        container("user", JWT::getUser());
        blade()->composer('*', function (BladeOne $blade) {
            $blade->with("user", app("user"));
        });
    }

    public static function middlewares()
    {
        Route::macro("can", function ($scope) {
            return $this->middleware(Can::class . ":" . $scope);
        });

        PendingResourceRegistration::macro("can", function ($scope) {
            return $this->middleware(Can::class . ":" . $scope);
        });

        Route::macro("auth", function ($type = "web") {
            if ($type == "api")
                return $this->middleware(WebAuthenticate::class);
            return $this->middleware(ApiAuthenticate::class);
        });
    }

    public static function tables()
    {
        migrate("roles", dirname(__FILE__));
        migrate("users", dirname(__FILE__));
        migrate("user_permission", dirname(__FILE__));
    }

    public static function onUpdate()
    {
        migrate("forgetPasswords", dirname(__FILE__));
    }

    public static function getSessionUser()
    {
        return isset(self::$cookie) ? (is_null(self::$cookie) ? null : self::$cookie) : (isset($_COOKIE[self::USER]) ? $_COOKIE[self::USER] : null);
    }

    public static function setSessionUser($user, $update = false)
    {
        if ((!self::$setCookie and is_null(self::getSessionUser())) or $update) {
            setcookie(self::USER, @$user->token, time() + 1296015, "/");
            self::$setCookie = true;
        }
        return $user;
    }

    public static function unsetSessionUser()
    {
        setcookie(self::USER, "", time() - 3600, "/");
        self::$setCookie = false;
        self::$cookie = null;
        self::$user = null;
        unset($_COOKIE[self::USER]);
    }

    public static function updateSessionUser()
    {
        return User::auth(self::getSessionUser());
    }

    public static function getBearerToken()
    {
        return trim(App::request()->bearerToken());
    }

    public static function getHeaderUser()
    {
        $token = @$_REQUEST[User::TOKEN] ?: self::getBearerToken();
        return User::auth($token);
    }

    public static function getUser()
    {
        if (isset(self::$user))
            return self::$user;
        $urlToken = @$_REQUEST[User::TOKEN];
        $urlToken = $urlToken == "null" ? false : $urlToken;
        $token = ($urlToken ?: self::getSessionUser()) ?? self::getBearerToken();
        if ($token)
            return self::$user = User::auth($token);
        return null;
    }

    public static function changeFaNumsToEn($string)
    {

        return strtr($string,
            ['۰' => '0',
                '۱' => '1',
                '۲' => '2',
                '۳' => '3',
                '۴' => '4',
                '۵' => '5',
                '۶' => '6',
                '۷' => '7',
                '۸' => '8',
                '۹' => '9',
                '٠' => '0',
                '١' => '1',
                '٢' => '2',
                '٣' => '3',
                '٤' => '4',
                '٥' => '5',
                '٦' => '6',
                '٧' => '7',
                '٨' => '8',
                '٩' => '9']);
    }

    private static function roles()
    {
        Role::where(Role::NAME, 'admin')->first()->addScope("admin.roles");
    }


}