<?php
return [
    "driver" => env("DATABASE_DRIVER", "mysql"),
    "host" => env("DATABASE_HOST", "localhost"),
    "database" => env("DATABASE_NAME", "v8"),
    "username" => env("DATABASE_USERNAME", "root"),
    "password" => env("DATABASE_PASSWORD", ""),
    "charset" => env("DATABASE_CHARSET", "utf8"),
    "collation" => env("DATABASE_COLLATION", "utf8_unicode_ci"),
    "prefix" => env("DATABASE_PREFIX", ""),
];