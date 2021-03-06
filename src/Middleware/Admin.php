<?php

namespace OhhInk\Rrm\Middleware;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
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
        // 判断是否开启google二次雅正，若开启切未绑定，则跳转至绑定页面
        if (config('admin.google_authenticator') && !Auth::user()->isBindGoogle()) {
            return redirect()->route('admin.bind');
        } else {
            if (Auth::user()->can(Route::currentRouteName())) {
                $lang = Cache::rememberForever('user_lang_'.Auth::user()->id, function() {
                    return false;
                });
                $lang?App::setLocale($lang):'';

                LogsJob::dispatch(Auth::user(),$request)->onQueue('logs');
                return $next($request);
            } else {
                return redirect()->route('error');
            }
        }

    }
}
