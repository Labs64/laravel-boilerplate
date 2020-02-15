#!/bin/bash

# Install dependencies
composer install --prefer-dist --no-interaction

# Generate application key
php artisan view:clear
php artisan config:clear
php artisan key:generate

# Verify environment config
cat .env

# Install dependencies
npm install
npm run dev

# Create database tables and populate seed data
php artisan migrate --seed --no-interaction

# Execute PHPUnit tests
vendor/bin/phpunit
