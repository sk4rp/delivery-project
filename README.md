PHP 8.1
Apache_2.4-PHP_8.0-8.1+Nginx_1.23
MySQL - 8.0-Win10

1) Запустить создать БД (я делал в phpmyadmin) - назвал её 'delivery' (написано это в .env файле)
2) Запустить миграции - php artisan migrate
3) Запустить seeders (заполни БД тестовыми данными) - php artisan db:seed --class=DeliverySeeder

Использовал Laravel 

"require": 
{
        "php": "^8.1",
        "guzzlehttp/guzzle": "^7.2",
        "laravel/framework": "^10.10",
        "laravel/sanctum": "^3.2",
        "laravel/tinker": "^2.8"
},

