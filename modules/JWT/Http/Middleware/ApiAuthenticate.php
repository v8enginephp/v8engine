<?php


namespace Module\JWT\Middleware;


use App\Helper\Submitter;
use Closure;
use Illuminate\Http\Request;
use Module\JWT\JWT;

class ApiAuthenticate
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
        if (JWT::getUser())
            return $next($request);
        return Submitter::error("Access Denied");
    }
}
