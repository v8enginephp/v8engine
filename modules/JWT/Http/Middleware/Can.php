<?php


namespace Module\JWT\Middleware;


use App\Helper\Submitter;
use Closure;
use Illuminate\Http\Request;
use Module\JWT\JWT;

class Can
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $scope
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $scope)
    {
        if (JWT::getUser()->can($scope))
            return $next($request);
        return Submitter::error("Access Denied");
    }
}