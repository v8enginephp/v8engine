<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;
use Module\JWT\Model\Role;

DB::schema()->create('roles', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string("title")->unique();
    $table->string("name");
    $table->text("scopes");
    $table->timestamps();
});

Role::create(["id" => 1, "title" => "admin", "name" => "Admin", "scopes" => json_encode(Role::ADMIN_SCOPES)]);
Role::create(["id" => 4, "title" => "sale_manager", "name" => "Sale Manager", "scopes" => json_encode(["marketer"])]);
Role::create(["id" => 5, "title" => "sale_supervisor", "name" => "Sale Supervisor", "scopes" => json_encode(["marketer"])]);
Role::create(["id" => 3, "title" => "marketer", "name" => "Marketer", "scopes" => json_encode(["marketer"])]);
Role::create(["id" => 2, "title" => "user", "name" => "User", "scopes" => json_encode([])]);
Role::create(["id" => 6, "title" => "whitelabel", "name" => 'White Label', "scopes" => json_encode(["whitelabel", "products", "shop"])]);
Role::create(["id" => 7, "title" => "master_agent", "name" => 'Master White Label', "scopes" => json_encode(["whitelabel", "products", "shop", "master_agent"])]);
