<?php
/**
 * V8 Engine
 * Modular Engine Powered By PHP
 * @copyright 2020 Aliakbar Soleimani
 * @author Aliakbar Soleimani Tadi
 * +989139002087
 */

use Core\App;
use App\Boot\Scheduler;

define("V8_START", microtime(true));
define("BASEDIR", __DIR__);

/*
 * Load Composer Packages
 */
require_once BASEDIR . "/vendor/autoload.php";
require_once BASEDIR . "/../composer/v8/vendor/autoload.php";


App::boot(Scheduler::class);