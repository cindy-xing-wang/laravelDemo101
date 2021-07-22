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

```
# bash
composer update
```

```
# bash
cp .env.example .env
```

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

Done!
Go to localhost to view the project.