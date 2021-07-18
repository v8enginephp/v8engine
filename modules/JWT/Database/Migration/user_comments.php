<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

DB::schema()->create('user_comments', function (Blueprint $table) {
    $table->id();
    $table->foreignId("sender")->comment("user who save this comment");
    $table->foreignId("user_id");
    $table->text("comment");
    $table->softDeletes();
    $table->timestamps();
});