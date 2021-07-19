<?php


namespace Module\JWT\Model;


use App\Helper\HasTable;
use App\Helper\Metable;
use App\Helper\Otp;
use Core\Model;
use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Module\JWT\JWT;
use function sprintf;

/**
 * @property mixed role_id
 * @property mixed phone
 * @property mixed two_factor_login
 * @property mixed verify_code
 * @property mixed parent_id
 * @property User parent
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

    public static function getDefaultColumns(): array
    {
        return [
            column(self::ID, "شناسه", 1),
            column(self::FULL_NAME, "نام", 2),
            column(self::ROLE_NAME, "سمت", 3),
            column(self::PHONE, "موبایل", 5),
            column(self::CREATED_AT_P, "تاریخ ثبت نام", 6),
            column(self::VERIFY_CODE, "کد تایید", 7),
            column(self::SITE, "سایت", 8),
            column(self::STATUS, "وضعیت", 9),
            column(self::CREDIT, "مانده حساب", 10),
            column("manage", "عملیات", 11, fn(self $model) => view("components.manage", compact("model")))
        ];
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

    public function verify($code): bool
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
        $this->fillable[] = "password";
        $this->update([self::PASSWORD => sha1($password)]);
    }

    public function twoFactorIsActive()
    {
        return $this->two_factor_login;
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function withRole(): User
    {
        $this->with("role");
        return $this;
    }

    public function setParent($parent): User
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

    public function isChildren($userId)
    {
        return in_array($userId, $this->children->pluck(self::ID)->toArray());
    }

    public function userPermission(): HasMany
    {
        return $this->hasMany(UserPermission::class);
    }

}