# Laravel Demo 101

## Download or git clone the project to your local machine
```
# bash
git clone https://github.com/cindy-xing-wang/laravelDemo101.git
```

## Run Laravel project locally
```
# bash
# Go to the folder laravelDemo101
cd laravelDemo101
```
Enable "extension=gd" in C:\xampp\php\php.ini
```
# bash
composer update
```

```
# bash
cp .env.example .env
```
Go to your database and create a database.
Update the .env file to match your database settings.
```
# bash
#Run migration to create database
php artisan key:generate
php artisan migrate
```

```
# bash
# Seeding data to the tables
php artisan db:seed --class Role
```

```
# bash
php artisan db:seed --class Site
```

```
# bash
# Seeding data to the tables
php artisan db:seed --class User
```
```
# bash
php artisan serve
```

Done!
Go to localhost to view the project.
