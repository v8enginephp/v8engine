<?php

namespace Module\JWT\Model;

use App\Helper\HasTable;
use Core\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Module\JWT\Model\User;

class UserComment extends Model
{
    use HasTable, SoftDeletes;

    protected $appends = ["created_at_p"];

    const SENDER = "sender",
        USER_ID = "user_id",
        COMMENT = "comment";

    protected $fillable = [
        self::SENDER,
        self::USER_ID,
        self::COMMENT,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}