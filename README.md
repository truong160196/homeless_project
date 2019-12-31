
# Homeless Project

## Description
Start developing a fresh Laravel application with `docker` using `docker-compose`.

The images used in this repo is `php:7.2-apache` and `mysql:5.7`. The goal is to make setting up the development as simple as possible.

## Up and running
Clone the repo:
```
$ git clone https://github.com/truong160196/homeless_project.git
$ cd homeless_project
```

Copy `.env.example` to `.env`
```
$ cp .env.example .env 
```

Build the images and start the services:
```
docker-compose build
docker-compose up -d
```
## Install File Apk
Copy file homelessFund.apk from directory. find app in android phone and install.


## Helper scripts
Running `composer`, `php artisan` or `phpunit` against the `php` container with helper scripts in the main directory:
```
php artisan key:generate
```
```
composer dumpautoload
```
```
php artisan migrate:fresh --seed
```
```
php artisan cache:clear
php artisan optimize
php artisan route:cache
php artisan view:clear
php artisan config:cache
```
