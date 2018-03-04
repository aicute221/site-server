<?php
/**
 * Created by PhpStorm.
 * User: xiang
 * Date: 18/3/3
 * Time: 下午2:55
 */

namespace App\Http\Middleware;


use App\Http\Controllers\Controller;

class AdminLoginMiddleware
{
    public function handle($request, \Closure $next)
    {
        if (!$request->session()->get(Controller::SESSION_ADMIN_SIGNED)){
            return redirect("/admin");
        }

        return $next($request);
    }
}