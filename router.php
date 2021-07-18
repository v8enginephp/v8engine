<?php
/**
 * @var $router Router
 */

use App\Controller\BaseController;
use Illuminate\Routing\Router;
use Module\JWT\Middleware\WebAuthenticate;

$router->group(["prefix" => "dashboard", 'middleware' => [WebAuthenticate::class]], function () use ($router) {
    $router->get("", [BaseController::class, "view"])->name("dashboard.main");
    $router->get("config", [BaseController::class, "config"]);
    $router->post("config/store", [BaseController::class, "storeConfig"]);
});

$router->any("backend/dashboard",function (){
   return redirect(route("dashboard.main"));
});