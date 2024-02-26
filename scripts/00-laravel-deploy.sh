#!/usr/bin/env bash

echo "Running composer"
composer global require hirak/prestissimo
composer install --working-dir=/var/www/html

echo "Optimize Caching..."
php artisan optimize:clear

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate:fresh --force --seed

echo "Optimize Caching..."
php artisan optimize



