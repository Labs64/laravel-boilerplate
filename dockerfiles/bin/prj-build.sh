#!/bin/bash

# Install dependencies
composer install --prefer-dist --no-interaction

# Show outdated composer dependencies
composer outdated

# Generate application key
php artisan view:clear
php artisan config:clear
php artisan key:generate

# Verify environment config
cat .env

# Install dependencies
npm install
npm run dev

# Show outdated npm dependencies
npm outdated

# Create database tables and populate seed data
php artisan migrate --seed --no-interaction

# Execute PHPUnit tests
vendor/bin/phpunit
