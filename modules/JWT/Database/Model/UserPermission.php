<?php


namespace Module\JWT\Model;


use App\Helper\HasTable;
use App\Helper\Metable;
use App\Helper\Observer;
use Carbon\Carbon;
use Core\Model;
use Exception;
use Illuminate\Support\Collection;
use Module\JWT\JWT;
use Module\Kavenegar\Kavenegar;
use Module\Shop\Model\Order;
use Module\Shop\Model\Payment;
use function sprintf;

class UserPermission extends Model
{
    use Metable, HasTable;

    protected $table='user_permission';

    const USER_ID="user_id",
    SCOPE="scope",
    STATUS="status";

    protected $fillable=[
        self::USER_ID,
        self::SCOPE,
        self::STATUS,
    ];

    public static function getDefaultColumns(): array
    {
        return [
            column("id","ردیف",0),
            column(self::SCOPE,"وظیفه",1),
            column(self::STATUS,"وضعیت",2),
            column("manage","مدیریت",3,fn(self $userPermission) => view("user.components.manage",compact("userPermission"))),
        ];
    }
}