#!/bin/bash
. ./docker/sh/porcentage.sh

touch database/database.sqlite
apk add php7-bcmath || true

echo "[ ${PORCENTAGE_0} ] Starting test with PHP Unit"
echo "[ ${PORCENTAGE_10} ] DB Migration and Seed"
php artisan migrate:refresh --seed
echo "[ ${PORCENTAGE_50} ] Run PHP Unit and generate coverage"
phpdbg -qrr vendor/phpunit/phpunit/phpunit --log-junit coverage/phpunit.report.xml --coverage-clover coverage/phpunit.coverage.xml
sed -i -e 's|/var/www/||g' coverage/phpunit.coverage.xml
sed -i -e 's|/var/www/||g' coverage/phpunit.report.xml
echo "[ ${PORCENTAGE_100} ] End of test with PHP Unit"
