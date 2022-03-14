#!/usr/bin/env php
<?php
define('LARAVEL_ENV_FILE', '../.env');

$env = isset($argv[1])? $argv[1] // set first argument as environment
    : 'local'; // or use default environment
$cfg_file = "conf/$env.php";
echo 
<<<EOD
Environment: $env
Configuration: $cfg_file\n
EOD;

include_once($cfg_file);
if ( !is_array($cfg) ) die ("Cannot find '$env' configuration object in '{$cfg_file}'!\n");

// read and backup .env
$env_contents = file_get_contents(LARAVEL_ENV_FILE);
$env_backup_file = "./" . hrtime(true) . ".env.bak";

// set .env accordingly
echo
<<<EOD
Rewrite Laravel '.env' for DB settings...\n
EOD;

file_put_contents($env_backup_file, $env_contents);
foreach($cfg as $key => $val) {
    $env_contents = preg_replace("/^(\s*$key\s*=)(.*)$/m", "$key=$val", $env_contents); // set modifier to multiline for using ^$
}
file_put_contents(LARAVEL_ENV_FILE, $env_contents);

$cmd_lines = <<<EOD
sudo mysql -u root -e 'CREATE USER IF NOT EXISTS `{$cfg['DB_USERNAME']}`@`{$cfg['DB_HOST']}` IDENTIFIED BY "{$cfg['DB_PASSWORD']}";'
sudo mysql -u root -e 'CREATE DATABASE IF NOT EXISTS `{$cfg['DB_DATABASE']}`;'
sudo mysql -u root -e 'GRANT ALL PRIVILEGES ON `{$cfg['DB_DATABASE']}`.* TO `{$cfg['DB_USERNAME']}`@`{$cfg['DB_HOST']}`;'
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
