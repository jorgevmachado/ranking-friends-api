#!/bin/sh
. ./docker/sh/porcentage.sh

set -e
echo "[ ${PORCENTAGE_0} ] Back - Starting Endpoint of Application"
if ! [ -d "./vendor" ]; then
    echo "[ ${PORCENTAGE_10} ] Install depedences whit composer..."
    composer install --ignore-platform-reqs --verbose
    echo "[ ${PORCENTAGE_40} ] DB Migration"
    php artisan migrate
    echo "[ ${PORCENTAGE_80} ] DB Seed"
    php artisan db:seed
fi
if ! [ -f "./public/.htaccess" ]; then
    echo ".htaccess not found - Copy file .htaccess.sample.domain to .htaccess..."
    cp ./public/.htaccess.sample.domain ./public/.htaccess
fi
apk add php7-bcmath || true
echo "[ ${PORCENTAGE_100} ] Back - Ending Endpoint of Application"
exec "$@"
