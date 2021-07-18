<?php

namespace Module\JWT\Middleware;

use Closure;
use Illuminate\Http\Request;
use Module\JWT\JWT;

class WebAuthenticate
{

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (JWT::updateSessionUser())
            return $next($request);
        return redirect("user/auth?redirect={$request->url()}");
    }
}