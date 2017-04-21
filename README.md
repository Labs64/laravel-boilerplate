<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/Labs64/laravel-boilerplate"><img src="https://travis-ci.org/Labs64/laravel-boilerplate.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/labs64/laravel-boilerplate"><img src="https://poser.pugx.org/labs64/laravel-boilerplate/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/labs64/laravel-boilerplate"><img src="https://poser.pugx.org/labs64/laravel-boilerplate/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/labs64/laravel-boilerplate"><img src="https://poser.pugx.org/labs64/laravel-boilerplate/license.svg" alt="License"></a>
</p>

# A Laravel 5 Boilerplate Project

_Laravel Boilerplate_ provides a very flexible and extensible way of building your custom Laravel 5 applications.

## Features
- Administration Dashboard with [Gentelella Admin Theme](https://github.com/puikinsh/gentelella)
- Responsive Layout
- Bootstrap 3
- Font Awesome
- Socialite Integration
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

## Minimum System Requirements
To be able to run Laravel Boilerplate you have to meet the following requirements:
- PHP > 5.6.4
- PHP Extensions: PDO, cURL, Mbstring, Tokenizer, Mcrypt, XML, GD
- Node.js > 6.0
- Composer > 1.0.0
- Bower

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
5. Install dependencies
```
$ composer install --prefer-dist
$ npm install
```
6. Edit `.env.example` according to your environment and save as `.env`
7. An application key can be generated with the command
```
$ php artisan key:generate
```
8. Execute following commands
```
$ bower install
$ npm run dev
```
9. Run these commands to create the tables within the defined database and populate seed data
```
$ php artisan migrate --seed
```
If you get an error like a `PDOException` try editing your `.env` file and change `DB_HOST=localhost` to `DB_HOST=127.0.0.1`.

## Run

To start the PHP built-in server
```
$ php -S localhost:8080 -t public/
```

Now you can browse the site [http://localhost:8080](https://photolancer.zone)  🙌

## How to contribute

Fork the repository, read the [CONTRIBUTE](CONTRIBUTE.md) file and make some changes.
Once you're done with your changes send a pull request and check [CI validation status](https://travis-ci.org/Labs64/laravel-boilerplate).
Thanks!

## Bugs and Feedback

For bugs, questions and discussions please use the [GitHub Issues](https://github.com/Labs64/laravel-boilerplate/issues).

## License

This boilerplate is open-sourced software licensed under the [MIT license](LICENSE).
