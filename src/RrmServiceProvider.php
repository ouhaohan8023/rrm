<?php

namespace OhhInk\Rrm;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use OhhInk\Rrm\Commands\CacheOnlineUsers;
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
        $this->mergeConfigFrom(__DIR__.'/Config/filesystems.php', 'filesystems');
        $this->mergeConfigFrom(__DIR__.'/Config/database.php', 'database');
        $this->mergeConfigFrom(__DIR__.'/Config/auth.php', 'auth');
        // 使用基于类方法的 composers...
        View::composer('rrm::admin.layout.right-bar', 'OhhInk\Rrm\Layout\RightBar');
        View::composer('rrm::admin.layout.header', 'OhhInk\Rrm\Layout\Header');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->publishes([
            __DIR__.'/Config/admin.php'       => config_path('admin.php'),
            //            __DIR__.'/config/permission.php' => config_path('permission.php'),
            __DIR__.'/Config/filesystems.php' => config_path('filesystems.php'),
        ], 'Config');

        $this->publishes([
            __DIR__.'/Public' => public_path('./'),
        ], 'public');

        $this->publishes([
            __DIR__.'/Database/seeds' => database_path('seeds'),
        ], 'seeds');

        $this->publishes([
            __DIR__.'/Resources/lang' => resource_path('lang/vendor/rrm/'),
        ], 'lang');

        $this->publishes([
            __DIR__.'/Resources/views/admin/index.blade.php'         => resource_path('views/vendor/rrm/admin/index.blade.php'),
            __DIR__.'/Resources/views/admin/layout/header.blade.php' => resource_path('views/vendor/rrm/admin/layout/header.blade.php'),
            __DIR__.'/Resources/views/admin/layout/footer.blade.php' => resource_path('views/vendor/rrm/admin/layout/footer.blade.php'),
        ], 'views');


        $this->loadTranslationsFrom(__DIR__.'/Resources/lang', 'rrm');
        $this->loadRoutesFrom(__DIR__.'/Routes/admin.php');
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'rrm');
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');
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
