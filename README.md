<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# A Laravel 5 Boilerplate Project

_Laravel Boilerplate_ provides a very flexible and extensible way of building your custom Laravel 5 applications.

## Features
- Administration Dashboard with [Gentelella Admin Theme](https://github.com/puikinsh/gentelella)
- Responsive Layout
- Bootstrap 3
- Font Awesome
- Socialite Integration

## Theme Demo
![Gentelella Bootstrap Admin Template](https://cdn.colorlib.com/wp/wp-content/uploads/sites/2/gentelella-admin-template-preview.jpg "Gentelella Theme Browser Preview")

**[Template Demo](https://colorlib.com/polygon/gentelella/index.html)**

## Minimum System Requirements
To be able to run Laravel Boilerplate you have to meet the following requirements:
- PHP 5.5.9 or higher
- PDO PHP Extension
- cURL PHP Extension
- OpenSSL PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- Mcrypt PHP Extension
- GD PHP Library
- MySql 5.5
- One of the following cache drivers: ```memcached```, ```redis```, ```apc```

## Installation
```
$ git clone https://github.com/Labs64/laravel-boilerplate.git
```
```
$ composer install --prefer-dist
```
```
$ npm install
```

### Database setup

Edit `.env.example` according to your environment and save as `.env`.
An application key can be generated with the command `php artisan key:generate`.

Run these commands to create the tables within the database you have already created.

```
$ php artisan migrate:install
```
```
$ php artisan migrate:refresh
```

If you get an error like a `PDOException` try editing your `.env` file and change `DB_HOST=localhost` to `DB_HOST=127.0.0.1`.

## Run

To provide the JS and CSS files and to keep track of changes to these files:
```
$ gulp && gulp watch
```

To start the PHP built-in server:
```
$ php -S localhost:8080 -t public/
```

Now you can browse the site  [http://localhost:8080](http://localhost:8080). 🙌

## How to contribute

Fork the repository, read the [CONTRIBUTE](CONTRIBUTE.md) file and make some changes.
Once you're done with your changes send a pull request and check [CI validation status](https://photolancer.zone).
Thanks!

## Bugs and Feedback

For bugs, questions and discussions please use the [GitHub Issues](https://github.com/Labs64/laravel-boilerplate/issues).

## License

This boilerplate is open-sourced software licensed under the [MIT license](LICENSE).
