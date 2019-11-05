# Laravel Rbac
[![standard-readme compliant](https://img.shields.io/badge/readme%20style-standard-brightgreen.svg?style=flat-square)](https://github.com/RichardLitt/standard-readme)

> 基于角色的权限管理拓展包

本拓展包是基于[Laravel Permission](https://github.com/spatie/laravel-permission.git)的界面化封装，用于快速搭建权限管理后台

本拓展包运行基础环境：

1. Php >= 7.2
2. Laravel >= 6.1

## 内容列表

- [声明](#声明)
- [背景](#背景)
- [安装](#安装)
- [使用说明](#使用说明)
- [相关仓库](#相关仓库)
- [维护者](#维护者)
- [如何贡献](#如何贡献)
- [使用许可](#使用许可)

## 声明
本文中的 **权限** 也就是 laravel中的 **路由**  

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

在项目根目录运行 [composer](https://getcomposer.org/)
```sh
$ composer install ohhink/rrm
```

根目录下运行资源发布，此命令会增加配置文件(`admin.php`,`filesystems.php`,`permission.php`)，以及前端资源文件和数据库填充文件
```sh
$ php artisan vendor:publish
```

根目录下运行数据库迁移填充命令
```sh
$ php artisan migrate:refresh --seed
```

至此，安装完毕

## 使用说明

后台默认路径 `/admin` , 此路径可以在`admin.php`中配置
安装过程中，已经默认创建了一个超级管理员`admin`
```sh
账号 : admin@gmail.com
密码 : admin&%@cv..
```

## 相关仓库

- [Laravel Permission](https://github.com/spatie/laravel-permission.git) - Associate users with permissions and roles

## 维护者

[@OhhInk](https://github.com/ouhaohan8023).

## 如何贡献

非常欢迎你的加入! 有任何问题或者想要贡献代码，请提交 issue

## 使用许可

[MIT](LICENSE) © OhhInk
