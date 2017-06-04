#!/bin/bash

# Generate application key
php artisan key:generate

# Verify environment config
cat .env

# Install dependencies
composer install --prefer-dist --no-interaction
npm install
bower install --allow-root
npm run dev

# Create database tables and populate seed data
php artisan migrate --seed --no-interaction
