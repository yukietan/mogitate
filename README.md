# アプリケーション名

# mogitate


## 環境構築

Dockerビルド

Git clone リンク

git clone https://github.com/yukietan/mogitate.git

docker-compose up -d --build


## Laravel環境構築

docker-compose exec php　bash

composer install

.env ファイル設定、環境変数を変更

php artisan key:generate

php artisan migrate

php artisan db:seed

## 使用技術

PHP バージョン（ホスト環境）: 8.4.5 (Mac本体)

PHP バージョン（Dockerコンテナ内）: 7.4.9

Laravel バージョン: 8.83.29

MySQL バージョン: 8.0.26

## ER図 
![ER図](.src/public/image/er-mogitate.drawio.png)

## URL

環境開発 : http://localhost/

phpMyAdmin : http://localhost:8080
