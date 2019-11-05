# Laravel Rbac
[![standard-readme compliant](https://img.shields.io/badge/readme%20style-standard-brightgreen.svg?style=flat-square)](https://github.com/RichardLitt/standard-readme)

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
5. Record the operation, you can choose to use job to do it sync
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
根目录下运行数据库迁移填充命令
```sh
$ php artisan migrate:refresh --seed
```

That's it !

## How to use

The default of the backend route is `/admin`, this can be change though the `config/admin.php`
The seeder have already make a super admin user , which account is below
```sh
account : admin@gmail.com
password : admin&%@cv..
```

## Related Efforts

- [Laravel Permission](https://github.com/spatie/laravel-permission.git) - Associate users with permissions and roles

## Maintainers

[@OhhInk](https://github.com/ouhaohan8023).

## Contributing

Feel free to dive in! Open an issue or submit PRs.

Standard Readme follows the Contributor Covenant Code of Conduct.

## License

[MIT](LICENSE) © OhhInk
