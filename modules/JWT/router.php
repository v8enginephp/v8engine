<?php

use Core\App;
use Module\JWT\{Controller\AdminProfileController,
    Controller\ProfileController,
    Controller\RoleController,
    Controller\UserApiController,
    Controller\UserPermissionController,
    Controller\UserWebController,
    Middleware\ApiAuthenticate,
    Middleware\Can,
    Middleware\NonWebAuthenticate,
    Middleware\WebAuthenticate
};
use Module\Log\Middleware\LogMiddleware;


$router = App::router();

/*
 * Api Routes
 */
$router->group(["prefix" => "api/user"], function () use ($router) {
    $router->post("auth", [UserApiController::class, "auth"])->middleware(LogMiddleware::class.":auth");
    $router->post("verify", [UserApiController::class, "verify"]);
    $router->get("", [UserApiController::class, "get"]);
//    $router->get("role", [UserApiController::class, "role"])->middleware(ApiAuthenticate::class);
//    $router->post("store", [UserApiController::class, "store"users]);
//    $router->post("login", [UserApiController::class, "login"]);
//    //Need Kavenegar Plugin
//    $router->post("login/phone", [UserApiController::class, "phoneLogin"]);
//    $router->post("phone/verify", [UserApiController::class, "verifyPhoneLogin"]);
});

/*
 * Web Routes (Views)
 */
$router->group(["prefix" => "user/"], function () use ($router) {
    $router->get("auth", [UserWebController::class, "auth"])->middleware(NonWebAuthenticate::class);
//    $router->get("login", [UserWebController::class, "login"])->middleware(NonWebAuthenticate::class);
//    $router->get("register", [UserWebController::class, "register"])->middleware(NonWebAuthenticate::class);
    $router->get("logout", [UserWebController::class, "logout"])->middleware(WebAuthenticate::class);
    $router->get('profile', [ProfileController::class, "index"])->middleware(WebAuthenticate::class)->name('user.profile.index');
    $router->post('profile', [ProfileController::class, "update"])->middleware(WebAuthenticate::class)->name('user.profile.update');
//    $router->get('orders', [ProfileController::class, "orders"])->middleware(WebAuthenticate::class)->name('user.orders.index');
});

$router->group(["prefix" => "users", "middleware" => [ApiAuthenticate::class, Can::class . ":admin.users"]], function () use ($router) {
    $router->get("{user}/role/update", [AdminProfileController::class, "roleUpdate"]);
    $router->get("/edit/{id}", [AdminProfileController::class, "edit"])->name('admin.users.edit');
    $router->put("/{id}", [AdminProfileController::class, "update"])->name('admin.users.update');
    $router->any("login/{id}", [AdminProfileController::class, "loginAsUser"])->name('admin.log.as.user');
    $router->get("", [AdminProfileController::class, "index"])->name('admin.users.index');
    $router->get("getComment", [AdminProfileController::class, "getComment"])->name('admin.users.comment')->withoutMiddleware(Can::class . ":admin.users")->middleware(Can::class . ":whitelabel");
    $router->post("setComment", [AdminProfileController::class, "setComment"])->name('admin.users.setcomment')->withoutMiddleware(Can::class . ":admin.users")->middleware(Can::class . ":whitelabel");
    $router->get("affiliate/{id}", [AdminProfileController::class, "subUsers"])->name('admin.marketer.users.index');
    $router->get("marketers/{id}", [AdminProfileController::class, "marketers"])->name('admin.sale.manager.users.index');
});

$router->group(["prefix" => "role", "as" => "role.", "middleware" => [WebAuthenticate::class], Can::class . ":admin.roles"], function () use ($router) {
    $router->resource("user", UserPermissionController::class);
    $router->resource("", RoleController::class)->parameter("", "role");
});