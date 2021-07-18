<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('user_permission', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger("user_id");
    $table->string("scope");
    $table->string("status");
    $table->timestamps();
});