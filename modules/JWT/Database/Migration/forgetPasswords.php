<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('forget_password', function (Blueprint $table) {
    $table->id();
    $table->text("email");
    $table->string("token");
    $table->timestamps();
});