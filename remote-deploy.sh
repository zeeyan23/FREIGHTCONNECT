#!/bin/bash
set -e

cd "/home/u948060652/freightconnect"

echo "============================================"
echo "FreightConnect deployment started"
echo "============================================"

echo "Extracting deployment package..."

unzip -oq freightconnect_deploy.zip

rm -f freightconnect_deploy.zip

echo "Setting project permissions..."

for dir in app bootstrap config database public resources routes tests
do
    if [ -d "$dir" ]; then
        find "$dir" -type d -exec chmod 755 {} +
        find "$dir" -type f -exec chmod 644 {} +
    fi
done

chmod 755 artisan

echo "Preparing Laravel cache directory..."

mkdir -p bootstrap/cache

chmod 755 bootstrap/cache

rm -f bootstrap/cache/config.php
rm -f bootstrap/cache/packages.php
rm -f bootstrap/cache/services.php

echo "Installing production Composer dependencies..."

composer install --no-dev --no-scripts --optimize-autoloader --no-interaction

echo "Running Laravel package discovery..."

 /usr/bin/php artisan package:discover --ansi

echo "Clearing Laravel caches..."

 /usr/bin/php artisan optimize:clear

echo "Running database migrations..."

 /usr/bin/php artisan migrate --force

echo "Creating production configuration cache..."

 /usr/bin/php artisan config:cache

echo "Syncing public assets..."

PUBLIC_PATH="/home/u948060652/domains/freightconnect.info/public_html"

mkdir -p "$PUBLIC_PATH"

for item in build css images videos
do
    if [ -d "public/$item" ]; then
        mkdir -p "$PUBLIC_PATH/$item"
        cp -a "public/$item/." "$PUBLIC_PATH/$item/"
    fi
done

for item in .htaccess favicon.ico robots.txt
do
    if [ -f "public/$item" ]; then
        cp -f "public/$item" "$PUBLIC_PATH/$item"
    fi
done

echo "============================================"
echo "Deployment completed successfully."
echo "============================================"

echo "Database migrations were executed automatically."