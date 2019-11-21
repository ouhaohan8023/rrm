# Laravel Rbac
[![standard-readme compliant](https://img.shields.io/badge/readme%20style-standard-brightgreen.svg?style=flat-square)](https://github.com/RichardLitt/standard-readme)

**[English](https://github.com/ouhaohan8023/rrm/blob/master/README.md)**
**[中文](https://github.com/ouhaohan8023/rrm/blob/master/README.cn.md)**

> 基于角色的权限管理拓展包

本拓展包是基于[Laravel Permission](https://github.com/spatie/laravel-permission.git)的界面化封装，用于快速搭建权限管理后台

本拓展包运行基础环境：

1. Php >= 7.2
2. Laravel >= 6.1

## 内容列表

- [声明](#声明)
- [展示](#展示)
- [背景](#背景)
- [安装](#安装)
- [使用说明](#使用说明)
- [相关仓库](#相关仓库)
- [维护者](#维护者)
- [如何贡献](#如何贡献)
- [使用许可](#使用许可)

## 声明
本文中的 **权限** 也就是 laravel中的 **路由**  

# 展示

面板首页
![dashboard](http://pic.ohh.ink/blade/show2.png)

用户列表
![user list](http://pic.ohh.ink/blade/show3.png)

用户权限分配
![user role assignment](http://pic.ohh.ink/blade/show4.png)

菜单构建
![menu build](http://pic.ohh.ink/blade/show6.png)

路由列表
![menu build](http://pic.ohh.ink/blade/show8.png)

10分钟内在线用户
![menu build](http://pic.ohh.ink/blade/show9.png)

## 背景

造轮子造的很烦，但又找不到完全合适的轮子去用，所以只能自己造了。

[Laravel Permission](https://github.com/spatie/laravel-permission.git) 项目很好用，但是不提供UI。本项目是基于Laravel Permission，在此基础上，加上了UI，努力做到开箱即用。

本拓展包做到的功能：

1. 基于角色的权限管理，一个用户可以分配多个角色，一个角色可以分配多个权限
2. 基于当前用户所拥有的权限，动态生成菜单
3. 一键更新最新权限
4. 记录用户操作日志，可使用队列异步
5. 后台界面

## 安装
> 推荐使用在Laravel新项目
> 记得先在php.ini中取消对`exec`，`shell_exec`，`proc*`等方法的限制

修改配置文件`.env`
```$xslt
# change database, and key
# change cache
CACHE_DRIVER=redis
REDIS_CLIENT=predis
# suggest
QUEUE_CONNECTION=redis
```

在项目根目录运行 [composer](https://getcomposer.org/)
```sh
$ composer require ohhink/rrm
```

根目录下运行资源发布，此命令会增加配置文件(`admin.php`,`filesystems.php`,`permission.php`)，以及前端资源文件和数据库填充文件
```sh
$ php artisan vendor:publish
$ php artisan vendor:publish --tag=seeds --force
```

根目录下运行数据库迁移填充命令
```sh
# run autoload first to update the userseeder
$ composer dump-autoload
$ php artisan migrate:refresh --seed
```

设置文件夹权限和软连接
```$xslt
$ chmod -R 777 storage
$ php artisan storage:link
```

至此，安装完毕

## 使用说明

 - 后台默认路径 `/admin` , 此路径可以在`admin.php`中配置
   安装过程中，已经默认创建了一个超级管理员`admin`
   ```sh
   账号 : admin@gmail.com
   密码 : admin&%@cv..
   ```

 - RBAC 的理念是，将权限赋予给角色，将角色赋予给用户。一个角色可以有多个权限，一个用户可以有多个角色。
   所以使用以下步骤加入你的业务逻辑
   1. 编写好你的业务逻辑路由
   2. 通过**路由检测**功能，获取最新的权限，例如**test**
   3. 在 **resources/vendor/rrm/zh-cn/permission.php** 中创建对应的翻译数据，若无此文件，可以自行创建此路径下的 **permission.php**。例如将 *test* 翻译为 **测试功能**
   4. 给对应的角色分配该路由，例如给**admin**用户分配**测试功能**
   5. 如果此功能为菜单功能，需要新增菜单，并重新调整菜单布局

 - 如果你想重写路由，请将以下代码加入文件**route/web.php**
   ```$php
   # this is rewrite the route to your app/Http/Controllers/IndexController.php index()
   
   Route::prefix(config('admin.prefix'))->middleware([
       'auth',
       'admin'
   ])->name('admin.')->group(function () {
       Route::get('/', 'IndexController@index')->name('index');
   });
   ```
   在你的 **app/Http/Controllers/IndexController.php** 控制器中，你应该这样写
   ```$php
   
   public function index()
   {
       // put your code here !!!
   
       return parent::index();
   }
   ```


 - 为了使用右侧菜单上的**在线用户**功能，你需要在文件**app/Console.Kernel.php**中增加命令，如下
   ```$php
   protected function schedule(Schedule $schedule)
   {
       // $schedule->command('inspire')
       //          ->hourly();
       $schedule->command('admin-tool:cache-online-users')->everyMinute();
   }
   ```
   
   同时，需要在服务器定时任务中，加入如下配置
   ```$php
   * * * * * php /home/vagrant/blade_package/artisan schedule:run >> /dev/null 2>&1
   ```

 - 因为本项目自带日志记录，用户的每一步操作都会记录下来。为了避免响应过慢的问题，可以开启异步记录，提升响应速度。
   想要修改为异步，只需要将 `.env` 文件中的 `QUEUE_CONNECTION=sync` 修改为 `QUEUE_CONNECTION=redis`
   当然，要使用redis，前提是已经加入PRedis包或者Redis服务

 - 如果你想修改无权限报错页面(500)，你可以创建 **resource/views/vendor/rrm/500.blade.php** 文件来重写它

 - 监听队列命令 
    ```$php
    php artisan queue:work --queue=logs --sleep=3 --tries=3
   
   # 建议使用supervisor
   # supervisor配置文件 laravel-worker.conf
   
   [program:logs]
   process_name=%(program_name)s_%(process_num)02d
   command=php path_to/artisan queue:work --queue=logs --sleep=3 --tries=3
   autostart=true
   autorestart=true
   user=root
   numprocs=2
   redirect_stderr=true
   stdout_logfile=path_to/supervisor/logs.log
   
   保存之后，运行 supervisorctl reload 加载配置
    ```

## 相关仓库

- [Laravel Permission](https://github.com/spatie/laravel-permission.git) - Associate users with permissions and roles

## 维护者

[@OhhInk](https://github.com/ouhaohan8023).

## 如何贡献

非常欢迎你的加入! 有任何问题或者想要贡献代码，请提交 issue

## 使用许可

[MIT](LICENSE) © OhhInk
