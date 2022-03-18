#!/usr/bin/env php
<?php
define('LARAVEL_ROOT', realpath(__DIR__ . '/../'));

/* `composer create-project` is the same as:
    - cp .env.example .env
    - composer install
    - php artisan key:generate --ansi
//*/
$laravel_root = LARAVEL_ROOT;
$cmd =
<<<EOD
cd $laravel_root && composer create-project
cd $laravel_root && npm ci
EOD;

echo "Command: $cmd\n";
system($cmd, $ret);
echo "Result: $ret\n";
