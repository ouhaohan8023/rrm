```$xslt
配置文件
php artisan vendor:publish --tag=config

资源
php artisan vendor:publish --tag=public

数据填充
php artisan vendor:publish --tag=seeds




强制迁移文件
php artisan vendor:publish --tag=data  --force

// 重建数据库并填充数据...
php artisan migrate:refresh --seed
```
