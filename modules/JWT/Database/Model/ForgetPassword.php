<?php

namespace Module\JWT\Model;

use Core\Model;

class ForgetPassword extends Model
{
    protected $table="forget_password";

    const EMAIL = "email",
        TOKEN = "token";

    protected $fillable = [
        self::EMAIL,
        self::TOKEN,
    ];
}