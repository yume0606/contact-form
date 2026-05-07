＃お問い合わせフォーム

＃＃Dockerビルド
-git clone git@github.com:yume0606/contact-form.git
-docker-compose up -d --build

＃＃Laravel環境構築
-cp .env.example .env
-docker run --rm \
 -u "$(id -u):$(id -g)" \
 -v "$(pwd):/var/www/html" \
 -w /var/www/html \
 -e COMPOSER_CACHE_DIR=/tmp/composer_cache \
 laravelsail/php82-composer:latest \
 composer install
-./vendor/bin/sail up -d
-./vendor/bin/sail artisan key:generate
-./vendor/bin/sail artisan migrate
-./vendor/bin/sail artisan db:seed

##実行環境
-PHP 8.2 / Laravel 10.x
-MySQL 8.4
-Docker (Laravel Sail-8.5)

##ER図
![ER図](./images/er.png)

##URL
お問い合わせフォーム入力ページ:http://localhost/
ログイン画面:http://localhost/login
ユーザー登録画面:http://localhost/register
