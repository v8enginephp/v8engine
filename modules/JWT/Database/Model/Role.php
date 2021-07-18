<?php


namespace Module\JWT\Model;


use App\Helper\HasTable;
use App\Helper\Metable;
use Core\Model;
use Symfony\Component\Routing\Loader\Configurator\Traits\PrefixTrait;

/**
 * @property mixed scopes
 * @property mixed title
 */
class Role extends Model
{
    use Metable,HasTable,Metable;

    const TITLE = "title", NAME = "name", SCOPES = "scopes";
    const ADMIN_SCOPES = ["admin", "admin.shop", "admin.products", "admin.categories", "admin.coupons", "admin.orders", "admin.payments", "admin.users", "admin.configs", "marketer", "products", "shop", "master_agent", "whitelabel"];
    const ADMIN = 1;
    const USER = 2;
    const MARKETER = 3;
    const SALE_MANAGER = 4;
    protected $fillable = [self::ID, self::TITLE, self::NAME, self::SCOPES];

    public function getScopes()
    {
        $scopes = json_decode($this->scopes, true);
        return $scopes ? $scopes : [];
    }

    public function addScope(string ...$scope)
    {
        $this->scopes = json_encode(array_values(array_unique(array_merge($this->getScopes(), $scope))));
        $this->save();
        return $this;
    }

    public static function getDefaultColumns(): array
    {
        return [
           column("id","ردیف",0),
           column(self::TITLE,"موضوع",2),
           column(self::NAME,"اسم",3),
           column(self::SCOPES,"وظایف",4,fn(self $role) => "<p class='text-truncate' style='max-width: 25rem;'>{$role->scopes}</p>"),
            column("manage","مدیریت",5,fn(self $role)=> view("role.components.manage",compact("role"))),
        ];
    }
}
