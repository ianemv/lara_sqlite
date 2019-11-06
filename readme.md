Steps:

1) copy .env.example to .env
2) update .env file and change db connection to DB_CONNECTION=sqlite
    and remove the following lines since we will be using sqlite
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
3) create database.sqlite at directory database
4) composer install from your bash command
5) npm run prod
7) php artisan migrate
6) php artisan run serve
