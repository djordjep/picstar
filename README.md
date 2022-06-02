<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Picstar.co test API

Simple Laravel RESTfull API  by djordjepuzic@gmail.com


## Install

Clone git repository, go to Docker folder and do `docker-compose up`

Docker should build 3 services php laravel api, nginx and db

to run migrations from container
```
docker exec -it <CONTAINER ID> /bin/bash
```

then

```
php artisan migrate:fresh --seed
```

navigate to http://localhost

## Tests

if you have composer locally 
```
composer test
```

or

```
docker exec -it <CONTAINER ID> /bin/bash
```
to enter container and then 
```
composer test
```
