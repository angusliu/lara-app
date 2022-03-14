#!/usr/bin/env php
<?php
require_once("../vendor/autoload.php");

define('LARAVEL_ROOT', realpath('../'));

$environment = isset($argv[1])? $argv[1] // set first argument as environment
    : 'local'; // or use default environment

$cmd = "./set_env.php $environment";
echo "Command: $cmd\n";
system($cmd, $ret);
echo "Result: $ret\n";

// if set LARAVEL_ROOT/.env from configuration failed, halt!
if ( $ret )
    exit($ret);

// load LARAVEL_ROOT/.env as an array
$env = Dotenv\Dotenv::createArrayBacked(LARAVEL_ROOT)->load();
if ( !is_array($env) )
    fwrite(STDERR, "Cannot find environment object in folder '" . LARAVEL_ROOT . "'!\n") && exit(-1);

$cmd_lines =
<<<EOD
sudo mysql -u root -e 'CREATE USER IF NOT EXISTS `{$env['DB_USERNAME']}`@`{$env['DB_HOST']}` IDENTIFIED BY "{$env['DB_PASSWORD']}";'
sudo mysql -u root -e 'CREATE DATABASE IF NOT EXISTS `{$env['DB_DATABASE']}`;'
sudo mysql -u root -e 'GRANT ALL PRIVILEGES ON `{$env['DB_DATABASE']}`.* TO `{$env['DB_USERNAME']}`@`{$env['DB_HOST']}`;'
sudo mysql -u root -e 'FLUSH PRIVILEGES;'
cd ../ && php artisan migrate 
cd ../ && php artisan db:seed
EOD;

/*
SELECT host, user, authentication_string FROM mysql.user // for mysql verion > 5.7
//*/

$cmds = explode("\n", $cmd_lines);
foreach($cmds as $cmd) {
    echo "Command: $cmd\n";
    system($cmd, $ret);
    echo "Result: $ret\n";

    if ( $ret ) break;
}
