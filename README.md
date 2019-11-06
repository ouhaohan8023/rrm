# Laravel Rbac
[![standard-readme compliant](https://img.shields.io/badge/readme%20style-standard-brightgreen.svg?style=flat-square)](https://github.com/RichardLitt/standard-readme)

**[English](https://github.com/ouhaohan8023/rrm/blob/master/README.md)**
**[中文](https://github.com/ouhaohan8023/rrm/blob/master/README.cn.md)**

> This Package is used for rules controller which based on roles

This package is based on [Laravel Permission](https://github.com/spatie/laravel-permission.git) and can build a rule controller panel with UI in few minutes.

Server Requirements：

1. Php >= 7.2
2. Laravel >= 6.1

## what include

- [Const](#Const)
- [Why I do this](#Why-I-do-this)
- [Installation](#Installation)
- [How to use](#How-to-use)
- [Related Efforts](#Related-Efforts)
- [Maintainers](#Maintainers)
- [Contributing](#Contributing)
- [License](#License)

## Const
The **rule** in this novel can be regards as **route** in Laravel

## Why I do this

Word is cheap , show me the code !

[Laravel Permission](https://github.com/spatie/laravel-permission.git) is a very good package without UI. So, this package is add UI on the laravel permission package and do some things to make the panel can be built quickly

What Include：

1. **Rule** controller based on **Role** , you can add more than one roles to a user .
2. Add more than one rules to a role .
3. Menus can be different as it depends on the rules the user have .
4. Write your new rules in the `routes/web.php` and it can be add in the program through one button
5. Record the operation, you can choose to use job to do it sync/async
6. Backend ui panel

## Installation
> Recommend to use new Laravel Project

Run the command in the root of your new laravel project with [composer](https://getcomposer.org/)
```sh
$ composer install ohhink/rrm
```

Publish the files , which include `admin.php`,`filesystems.php`,`permission.php` and front resource files and database seeds files
```sh
$ php artisan vendor:publish
```

Build the database and run the seeder
```sh
$ php artisan migrate:refresh --seed
```

That's it !

## How to use

 - The default of the backend route is `/admin`, this can be change though the `config/admin.php`
   The seeder have already make a super admin user , which account is below
   ```sh
   account : admin@gmail.com
   password : admin&%@cv..
   ```

 - What's RBAC talk about is , assign one or more rules to a role and assign one or more roles to a user. We can controller rules with a role , which we normally do rather than a detail rule.
     So , there is few steps you have to do with your business logic
     1. finish your code and add your routes in the route/web.php like you normally do
     2. click the **Route Reload** . For example , we get the new route **admin.test**
     3. create or update your translate files in the path **resources/vendor/rrm/zh-cn/permission.php**
     4. assign this new route to a role , like **admin**
     5. if this new route is a menu function, you should create a new menu and rebuild the menu otherwise the new menu will not display
     
 - If you want to rewrite the route , you should add below to you **route/web.php**
   ```$php
   # this is rewrite the route to your app/Http/Controllers/IndexController.php index()
   
   Route::prefix(config('admin.prefix'))->middleware([
       'auth',
       'admin'
   ])->name('admin.')->group(function () {
       Route::get('/', 'IndexController@index')->name('index');
   });
   ```
   In your **app/Http/Controllers/IndexController.php** file ，you should add below 
   ```$php
   
   public function index()
   {
       // put your code here !!!
   
       return parent::index();
   }
   ```

 - To see the online-user in the right bar , you have to add command in the **app/Console.Kernel.php** file, like this
   ```$php
   protected function schedule(Schedule $schedule)
   {
       // $schedule->command('inspire')
       //          ->hourly();
       $schedule->command('admin-tool:cache-online-users')->everyMinute();
   }
   ```
   
   And Remember To Add Command In Your Server
   ```$php
   * * * * * php /home/vagrant/blade_package/artisan schedule:run >> /dev/null 2>&1
   ```

 - Since it record every step user did on panel, if you want to do it async, you can change the key val `QUEUE_CONNECTION=sync` in `.env` files to `QUEUE_CONNECTION=redis`
   This will make the recorder use jobs to async log the operations which will be faster. Of course you have to add Redis or PRedis package first 


## Related Efforts

- [Laravel Permission](https://github.com/spatie/laravel-permission.git) - Associate users with permissions and roles

## Maintainers

[@OhhInk](https://github.com/ouhaohan8023).

## Contributing

Feel free to dive in! Open an issue or submit PRs.

Standard Readme follows the Contributor Covenant Code of Conduct.

## License

[MIT](LICENSE) © OhhInk
