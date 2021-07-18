<?php


namespace Module\JWT\Model;


use App\Helper\HasTable;
use App\Helper\Metable;
use App\Helper\Otp;
use Carbon\Carbon;
use Core\Model;
use Exception;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Module\JWT\JWT;
use Module\Kavenegar\Kavenegar;
use Module\Shop\Model\Order;
use Module\Shop\Model\Payment;
use Module\JWT\Model\UserComment;
use function sprintf;

/**
 * @property mixed role_id
 * @property mixed phone
 * @property mixed two_factor_login
 * @property mixed verify_code
 * @property mixed parent_id
 * @property User parent
 * @property Order[] orders
 * @property Collection children
 * @property mixed credit
 * @property mixed slug
 * @property mixed name
 * @property mixed family
 * @property mixed full_name
 * @property mixed token
 * @property Role role
 * @property mixed site
 * @method exists()
 * @method orWhere(string $string, string $string1, string $string2)
 */
class User extends Model
{
    use Metable, HasTable, Otp;

    const  EMAIL = "email",
        PASSWORD = "password",
        SLUG = "slug",
        CREDIT = "credit",
        ADDRESS = "address",
        ROLE_ID = "role_id",
        TOKEN = "token",
        PHONE = "phone",
        VERIFY_CODE = "verify_code",
        VERIFY_TIMESTAMP = 'verify_timestamp',
        VERIFY_TRY = "verify_try",
        DATA = "data",
        PARENT_ID = "parent_id";
    const STATUS = "status", VERIFY = "verify", ACTIVE = "active";
    const NAME = "name", FAMILY = "family", CITY = "city", COUNTRY = "country", SITE = "site";
    const TOKEN_PREFIX = "V8_";
    const FULL_NAME = "full_name", ROLE_NAME = "role_name", CREATED_AT_P = "created_at_p";

    public static int $defaultRoleId = 6;
    /**
     * @var mixed
     */
    public static int $defaultParentId = 1;

    protected $appends = [
        self::FULL_NAME
    ];

    protected $fillable = [
        self::PHONE,
        self::ROLE_ID,
        self::TOKEN,
        self::EMAIL,
        self::NAME,
        self::FAMILY,
        self::CITY,
        self::COUNTRY,
        self::SITE,
        self::ADDRESS,
        self::VERIFY_CODE,
        self::VERIFY_TRY,
        self::VERIFY_TIMESTAMP,
        self::DATA,
        self::STATUS];

    protected $hidden = [
        self::PASSWORD,
        self::ROLE_ID,
//        self::PHONE,
        self::TOKEN,
        self::EMAIL,
        self::CREDIT,
        self::UPDATED_AT,
        self::VERIFY_CODE,
        self::VERIFY_TRY,
        self::VERIFY_TIMESTAMP,
        self::ADDRESS];

    public static function auth($token)
    {
        return JWT::setSessionUser(self::where(self::TOKEN, $token)->with("role")->first());
    }

    public static function login($email, $password)
    {
        return self::where(self::EMAIL, $email)->where(self::PASSWORD, $password)->first();
    }

    public static function getLastHalfOrder($userId = null): ?Order
    {
        $userId = $userId ?: JWT::getUser()->id;
        return Order::where(Order::USER_ID, $userId)
            ->whereNotNull(Order::USER_ID)
            ->where(Order::STATUS, "!=", "کارت به کارت")
            ->where(Order::IS_PAID, 0)
            ->whereDate(Order::CREATED_AT, ">=", Carbon::now()->addHours(-24))->first();
    }

    public static function getDefaultColumns(): array
    {
        return [
            column(self::ID, "شناسه", 1, fn(self $user) => view("user.components.id", ["model" => $user])),
            column(self::FULL_NAME, "نام", 2),
            column(self::ROLE_NAME, "سمت", 3),
            column("children", "زیر مجموعه ها", 4, fn(self $user) => "<a href='" . url("users") . "/affiliate/.{$user->id}' class='btn btn-info rounded open-edit-model'>مشاهده</a>"),
            column(self::PHONE, "موبایل", 5),
            column(self::CREATED_AT_P, "تاریخ ثبت نام", 6),
            column(self::VERIFY_CODE, "کد تایید", 7),
            column(self::SITE, "سایت", 8),
            column(self::STATUS, "وضعیت", 9),
            column(self::CREDIT, "مانده حساب", 10),
            column("manage", "عملیات", 11, fn(self $model) => view("components.manage", compact("model")))
        ];
    }

    public static function findMarketer($slug)
    {
        if (!$slug)
            return null;
        return User::where(User::SLUG, $slug)->whereHas("role", function ($query) {
            return $query->where(Role::SCOPES, "LIKE", "%\"marketer\"%");
        })->first();
    }

    public function getRoleNameAttribute()
    {
        return @$this->role->name;
    }

    public function sendVerifyCode()
    {
        if ($this->verify_timestamp > time() - 120)
            return false;
        $verifyCode = rand(100, 999);
        $this->otp($this->phone, JWT::$verifyOtpTemplate, $verifyCode);
        return $this->update([User::VERIFY_CODE => $verifyCode, User::STATUS => User::VERIFY, self::VERIFY_TIMESTAMP => time()]);
    }

    public function verify($code)
    {
        if ($code != $this->verify_code) {
            $this->increment(self::VERIFY_TRY);
            return false;
        }
        $this->update([User::VERIFY_CODE => null, User::STATUS => User::ACTIVE, self::VERIFY_TRY => 0, User::VERIFY_TIMESTAMP => null]);
        return true;
    }

    public function setPassword($password)
    {
        $this->update([self::PASSWORD => sha1($password)]);
    }

    public function twoFactorIsActive()
    {
        return $this->two_factor_login;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function withRole()
    {
        $this->with("role");
        return $this;
    }

    public function setParent($parent)
    {
        if (is_int($parent))
            $parent = self::find($parent);

        if ($parent and $parent->id != $this->parent_id) {
            if (!($parent->can("marketer") or $parent->can("whitelabel")))
                throw new Exception("User Without Marketer Access Cant be Parent");
            $this->parent_id = $parent->id;
            $this->save();
        }
        return $this;
    }

    public function can($scope)
    {
        if ($scope == "")
            return true;

        $scopes = $this->role ? $this->role->getScopes() : [];

        if (in_array($scope, $scopes))
            return true;

        return false;
    }

    public function access($model)
    {
        if ($model instanceof Model) {
            return $model->userCan($this);
        }
        return false;
    }

    public function parent()
    {
        return $this->belongsTo(self::class, self::PARENT_ID);
    }

    public function children()
    {
        return $this->hasMany(User::class, self::PARENT_ID);
    }

    public function getFullNameAttribute()
    {
        return sprintf("%s %s", $this->name, $this->family);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function isChildren($userId)
    {
        return in_array($userId, $this->children->pluck(self::ID)->toArray());
    }

    public function checkAndCostWallet($amount)
    {
        if ($this->credit >= $amount) {
            return $this->costWallet($amount);
        }
        return false;
    }

    public function costWallet($amount, $maxLoan = 10000)
    {
        if ((!$maxLoan) or $this->credit + $maxLoan >= $amount)
            return $this->decrement(self::CREDIT, $amount);

        return false;
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getDirectProfitPercent()
    {
        return 20 / 100;
    }

    public function getLvl2ProfitPercent()
    {
        return 5 / 100;
    }

    public function setActiveCustomer($customerId)
    {
        if (!$customerId)
            setcookie('customer', $customerId, time() - 100, "/");
        setcookie('customer', $customerId, time() + 10000, "/");
    }

    public function userPermission(): HasMany
    {
        return $this->hasMany(UserPermission::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(UserComment::class);
    }

    public function getCommentTagsAttribute()
    {
        return $this->commentTags();
    }

    /**
     * @return array
     */
    public function commentTags(): array
    {
        $tags=[];

        collect($this->comments)->map(function ($item) use(&$tags){
            $re = '/#[a-zA-Z0-9]+/m';
            preg_match_all($re, $item->comment, $matches, PREG_SET_ORDER, 0);
            $tags=array_merge_recursive($tags,...$matches);
        });

        return $tags;
    }

    public function otpLog()
    {
        return $this->hasMany(\Module\Kavenegar\Model\OtpLog::class,"parent_id");
    }
}