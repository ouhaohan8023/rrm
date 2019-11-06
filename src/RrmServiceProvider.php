<?php

namespace OhhInk\Rrm;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use OhhInk\Rrm\Commands\CacheOnlineUsers;
use OhhInk\Rrm\Jobs\LogsJob;
use OhhInk\Rrm\Middleware\Admin;

class RrmServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/filesystems.php', 'filesystems');
        $this->mergeConfigFrom(__DIR__.'/config/database.php', 'database');
        // 使用基于类方法的 composers...
        View::composer('rrm::admin.layout.right-bar', 'OhhInk\Rrm\ViewComposers\RightBar');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/admin.php'       => config_path('admin.php'),
            //            __DIR__.'/config/permission.php' => config_path('permission.php'),
            __DIR__.'/config/filesystems.php' => config_path('filesystems.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/public' => public_path('./'),
        ], 'public');

        $this->publishes([
            __DIR__.'/database/seeds' => database_path('seeds'),
        ], 'seeds');

        $this->publishes([
            __DIR__.'/resources/lang' => resource_path('./vendor/rrm/'),
        ], 'lang');

        //        $this->publishes([
        //            __DIR__.'/view/admin' => resource_path('views/admin'),
        //        ], 'views');


        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'rrm');
        $this->loadRoutesFrom(__DIR__.'/routes/admin.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'rrm');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->app['router']->aliasMiddleware('admin', Admin::class);

        // give all right to super admin
        Gate::before(function ($user, $ability) {
            return $user->hasRole(config('admin.super_admin')) ? true : null;
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                CacheOnlineUsers::class,
            ]);
        }
    }

    /**
     * Merge the given configuration with the existing configuration.
     *
     * @param  string  $path
     * @param  string  $key
     * @return void
     */
    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);
        $this->app['config']->set($key, $this->mergeConfig($config, require $path));
    }

    /**
     * Merges the configs together and takes multi-dimensional arrays into account.
     *
     * @param  array  $original
     * @param  array  $merging
     * @return array
     */
    protected function mergeConfig(array $original, array $merging)
    {
        $array = array_merge($original, $merging);
        foreach ($original as $key => $value) {
            if (!is_array($value)) {
                continue;
            }
            if (!Arr::exists($merging, $key)) {
                continue;
            }
            if (is_numeric($key)) {
                continue;
            }
            $array[$key] = $this->mergeConfig($value, $merging[$key]);
        }
        return $array;
    }
}
