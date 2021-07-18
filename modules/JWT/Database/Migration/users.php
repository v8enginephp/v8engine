<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('users', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->string("name")->nullable();
    $table->string("family")->nullable();
    $table->unsignedBigInteger("department_id")->nullable();
    $table->unsignedBigInteger("role_id");
    $table->string("phone")->nullable();
    $table->unsignedBigInteger("parent_id")->nullable();
    $table->string("city")->nullable();
    $table->integer("verify_code")->nullable();
    $table->bigInteger("verify_timestamp")->nullable();
    $table->bigInteger("verify_try")->default(0);
    $table->boolean("two_factor_login")->default(false);
    $table->string("country")->nullable();
    $table->string("address")->nullable();
    $table->string("email")->nullable();
    $table->string("site")->nullable()->unique();
    $table->string("slug")->nullable()->unique();
    $table->string("password")->nullable();
    $table->string("token")->unique();
    $table->bigInteger("credit")->default(0);
    $table->string("status")->default("active");
    $table->timestamps();
});