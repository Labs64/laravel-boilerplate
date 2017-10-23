<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/Labs64/laravel-boilerplate"><img src="https://travis-ci.org/Labs64/laravel-boilerplate.svg" alt="Build Status"></a>
<a href="https://github.com/Labs64/laravel-boilerplate/blob/master/composer.json"><img src="https://img.shields.io/badge/php-%3E%3D%205.6-8892BF.svg" alt="PHP Badge"></a>
<a href="https://packagist.org/packages/labs64/laravel-boilerplate"><img src="https://poser.pugx.org/labs64/laravel-boilerplate/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/labs64/laravel-boilerplate"><img src="https://poser.pugx.org/labs64/laravel-boilerplate/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/labs64/laravel-boilerplate"><img src="https://poser.pugx.org/labs64/laravel-boilerplate/license.svg" alt="License"></a>
<a href="https://waffle.io/Labs64/laravel-boilerplate"><img src="https://badge.waffle.io/Labs64/laravel-boilerplate.svg?label=ready&title=Ready" alt="Stories in Ready"></a>
</p>

# Laravel 5 Boilerplate Project

_Laravel Boilerplate_ provides a very flexible and extensible way of building your custom Laravel 5 applications.

## Table of Contents

- [Features](#features)
- [Theme Demo](#theme-demo)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Run](#run)
- [Docker](#docker) :point_left:
- [How To's & Modules configuration](#how-tos--modules-configuration)
- [How to contribute](#how-to-contribute)
- [Bugs and Feedback](#bugs-and-feedback)
- [License](#license)

## Features
- Administration Dashboard with [Gentelella Admin Theme](https://github.com/puikinsh/gentelella)
- Responsive Layout
- Bootstrap 3
- Font Awesome
- Socialite Integration
- [Invisible reCAPTCHA](https://github.com/albertcht/invisible-recaptcha)
- **Membership plans and Access control management** by [NetLicensing](https://netlicensing.io/?utm_source=Laravel_Boilerplate&utm_medium=github&utm_campaign=laravel_boilerplate&utm_content=readme) :thumbsup:
- MySQL, SQLite, PostgreSQL databases support
- AWS S3 support
- Google Analytics support in frontend
    - Configuration can be easily made via ```analytics.php``` and template ```ga.blade.php```
- Automatic errors feedback via eMail
- i18n support and automatic user client language recognition
- Helper class ```ToJs``` to ease work with JavaScript variables using blade directive ```@tojs```
- Helper class ```Meta``` blade directive ```@meta``` to ease work with meta tags & properties
- Models for Users and Roles
- Added Auth controller to allow registration activation by email
- Extended Auth configuration by:
    - Ability to switch on/off user registration
    - Set up default user role
    - Ability to switch on/off registration activation email
    - Captcha configuration
- Gravatar support in User model and flexible configuration via ```gravatar.php```
- Added library log viewer to allow printing errors in a log file ```laravel.log```
- Added library sortable for tables sorting
- i18n: ```trans()``` method replaced by ```__()``` in order to support internationalization via JSON resources
- Registration using social services (Google+, Facebook, Twitter)
- Storing last social login in user session
- Added event on SocialLogin
- Added listeners on some events; e.g. Login, Logout, Registration, SocialLogin
- Added notification ```ConfirmEmail``` on user account confirmation
- Added policies to access backend services
- Added database seeders for Users, Roles, and UserRoles
- Improved migration ```create_users_table.php```; fields added active, confirm and deleted_at for soft deletion
- JavaScript / CSS minification
- JavaScript / CSS hashing
- Some very useful helper functions to ease your live :)

## Theme Demo
![Gentelella Bootstrap Admin Template](https://cdn.colorlib.com/wp/wp-content/uploads/sites/2/gentelella-admin-template-preview.jpg "Gentelella Theme Browser Preview")

**[Gentelella Admin Theme Demo](https://colorlib.com/polygon/gentelella/index.html)**

## System Requirements
To be able to run Laravel Boilerplate you have to meet the following requirements:
- PHP > 7.0
- PHP Extensions: PDO, cURL, Mbstring, Tokenizer, Mcrypt, XML, GD
- Node.js > 6.0
- Composer > 1.0.0

## Installation
1. Install Composer using detailed installation instructions [here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
2. Install Node.js using detailed installation instructions [here](https://nodejs.org/en/download/package-manager/)
3. Clone repository
```
$ git clone https://github.com/Labs64/laravel-boilerplate.git
```
4. Change into the working directory
```
$ cd laravel-boilerplate
```
5. Copy `.env.example` to `.env` and modify according to your environment
```
$ cp .env.example .env
```
6. Install composer dependencies
```
$ composer install --prefer-dist
```
7. An application key can be generated with the command
```
$ php artisan key:generate
```
8. Execute following commands to install other dependencies
```
$ npm install
$ npm run dev
```
9. Run these commands to create the tables within the defined database and populate seed data
```
$ php artisan migrate --seed
```
If you get an error like a `PDOException` try editing your `.env` file and change `DB_HOST=127.0.0.1` to `DB_HOST=localhost` or `DB_HOST=mysql` (for *docker-compose* environment).

## Run

To start the PHP built-in server
```
$ php artisan serve --port=8080
or
$ php -S localhost:8080 -t public/
```

Now you can browse the site at [http://localhost:8080](http://localhost:8080)  🙌

## Docker

Here is a Docker based local development environment prepared, which provides a very flexible and extensible way of building your custom Laravel 5 applications.

### What's Inside
This project is based on [docker-compose](https://docs.docker.com/compose/). By default, the following containers are started: _laravel-env (centos:7 based), mysql, nginx_. Additional containers (_phpmyadmin, mailhog_) are externalized into `docker-compose.utils.yml`. The `/var/www/laravel-boilerplate` directory is the web root which is mapped to the nginx container.
You can directly edit configuration files from within the repo as they are mapped to the correct locations in containers.

<p align="center"><img src="https://raw.githubusercontent.com/Labs64/laravel-boilerplate/master/dockerfiles/img/laravel-boilerplate-docker.png" alt="Laravel Boilerplate Docker"></p>

### System Requirements
To be able to run Laravel Boilerplate you have to meet the following requirements:
* [docker](https://www.docker.com)
* [docker-compose](https://docs.docker.com/compose/)

### Run

1. Clone repository
```
$ git clone https://github.com/Labs64/laravel-boilerplate.git
```

2. Copy `.env.example` to `.env` and modify according to your environment (make sure database host set to `DB_HOST=mysql`)
```
$ cp .env.example .env
```

3. Start environment
```
$ docker-compose up -d  # to start base containers
or
$ docker-compose -f docker-compose.yml -f docker-compose.utils.yml up -d  # to start base and utils containers
```

4. Build project
```
$ docker exec laravelboilerplate_laravel-env_1 ./dockerfiles/bin/prj-build.sh
 or
$ docker-compose run --rm laravelboilerplate_laravel-env_1 ./dockerfiles/bin/prj-build.sh
```

Now you can browse the site at [http://localhost:80](http://localhost:80)  🙌

---

5. Stop environment
```
$ docker-compose down
 or
$ docker-compose -f docker-compose.yml -f docker-compose.utils.yml down
```

## How To's & Modules configuration

Check out project [wiki](https://github.com/Labs64/laravel-boilerplate/wiki) pages for modules configuration and troubleshooting.
For more detailed instructions on how to use Laravel and it's extensions, check out the full Laravel [documentation](https://laravel.com/docs/).

## How to contribute

Fork the repository, read the [CONTRIBUTE](CONTRIBUTE.md) file and make some changes.
Once you're done with your changes send a pull request and check [CI validation status](https://travis-ci.org/Labs64/laravel-boilerplate).
Thanks!

### Contributors and Supporters

Thank you to all the [contributors](https://github.com/Labs64/laravel-boilerplate/graphs/contributors) on this project. Your help is much appreciated!

- [Photolancer Zone](https://photolancer.zone/?utm_source=Laravel_Boilerplate&utm_medium=github&utm_campaign=laravel_boilerplate&utm_content=readme) team for a great support in project structuring.
- [DigiPass Laravel](https://github.com/Labs64/DigiPass-laravel) - Membership pricing plans and Access control management for Laravel

## Bugs and Feedback

For bugs, questions and discussions please use the [GitHub Issues](https://github.com/Labs64/laravel-boilerplate/issues).

## License

This boilerplate is open-sourced software licensed under the [MIT license](LICENSE).
