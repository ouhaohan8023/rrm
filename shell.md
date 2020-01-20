```$xslt
配置文件
php artisan vendor:publish --tag=config

资源
php artisan vendor:publish --tag=public

数据填充
php artisan vendor:publish --tag=seeds

admin 首页模板
php artisan vendor:publish --tag=views --force


强制迁移文件
php artisan vendor:publish --tag=data  --force

// 重建数据库并填充数据...
php artisan migrate:refresh --seed

// 本地测试包
composer require ohhink/rrm:dev-master

"repositories": [
    {
        "type": "path",
        "url": "./package/ohh-ink/rrm"
    }
]

// 删除composer缓存
composer clear-cache

// 删除远程标签
git push origin :refs/tags/1.1.2

// 删除本地标签
git tag -d 1.1.1

// 创建标签
git tag 1.1.2

// 推送标签
git push origin 1.1.2
// OR 
git push origin --tags
```


