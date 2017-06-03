#!/bin/bash

# Copy environment config
cp .env.example .env

# Install dependencies
composer install --prefer-dist --no-interaction

# Install dependencies
#nvm install $NODEJS_VERSION
npm install

# Generate application key
php artisan key:generate

# Verify environment config
cat .env

# Install dependencies
bower install --allow-root
npm run dev

# Create database tables and populate seed data
php artisan migrate --seed --no-interaction
