<?php

namespace OhhInk\Rrm\Middleware;

use OhhInk\Rrm\Jobs\LogsJob;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Support\Facades\Route;

class Admin extends Middleware
{
    /**
     * 判断当前用户是否具有权限
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param mixed ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::user()->can(Route::currentRouteName())) {
            LogsJob::dispatch(Auth::user(),$request)->onQueue('logs');
            return $next($request);
        } else {
            dd(404);
        }
    }
}
