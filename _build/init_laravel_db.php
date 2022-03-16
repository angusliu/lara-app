#!/usr/bin/env php
<?php
require_once(__DIR__ . '/../vendor/autoload.php');

define('LARAVEL_ROOT', realpath(__DIR__ . '/../'));

// set first argument as environment
$environment = isset($argv[1])?$argv[1]:NULL;
if ( !$environment ) {
    $script_name = basename($argv[0]);
    fwrite(STDERR, "Usage: $script_name <env_config> e.g. $script_name local\n") && exit(-1);
}

// call external script to setup LARAVEL_ROOT/.env
$cmd = __DIR__ . "/set_env.php $environment";
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

$laravel_root = LARAVEL_ROOT;
$cmd_lines =
<<<EOD
sudo mysql -u root -e 'CREATE USER IF NOT EXISTS `{$env['DB_USERNAME']}`@`{$env['DB_HOST']}` IDENTIFIED BY "{$env['DB_PASSWORD']}";'
sudo mysql -u root -e 'CREATE DATABASE IF NOT EXISTS `{$env['DB_DATABASE']}`;'
sudo mysql -u root -e 'GRANT ALL PRIVILEGES ON `{$env['DB_DATABASE']}`.* TO `{$env['DB_USERNAME']}`@`{$env['DB_HOST']}`;'
sudo mysql -u root -e 'FLUSH PRIVILEGES;'
cd $laravel_root && php artisan migrate 
cd $laravel_root && php artisan db:seed
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
