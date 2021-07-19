<?php


namespace Module\JWT\Controller;


use Module\JWT\JWT;

class UserWebController
{
    public function auth()
    {
        return view("auth");
    }

    public function login()
    {
        return view("login");
    }

    public function register()
    {
        return view("register");
    }

    public function forget()
    {
        return view("forget");
    }

    public function reset()
    {
        return view("reset");
    }

    public function logout()
    {
        JWT::unsetSessionUser();
        return redirect("");
    }
}