#!/usr/bin/env php
<?php
error_reporting(E_ERROR);

define('LARAVEL_ENV_FILE', __DIR__ . '/../.env');

$environment = isset($argv[1])? $argv[1] // set first argument as environment
    : 'local'; // or use default environment
$cfg_file = "conf/{$environment}.php";

echo 
<<<EOD
Environment: $environment
Configuration: $cfg_file\n
EOD;

include_once($cfg_file);
if ( !is_array($cfg) )
    fwrite(STDERR, "Cannot find '$environment' configuration object in '{$cfg_file}'!\n") && exit(-1);

// read and backup .env
$env_contents = file_get_contents(LARAVEL_ENV_FILE);
$env_backup_file = "./temp/laravel-" . hrtime(true) . ".env.bak";

echo
<<<EOD
Backup original '.env' to '$env_backup_file'.\n
EOD;
file_put_contents($env_backup_file, $env_contents);

// set .env accordingly
echo
<<<EOD
Rewrite Laravel '.env' for DB settings...\n
EOD;

foreach($cfg as $key => $val) {
    $env_contents = preg_replace("/^(\s*$key\s*=)(.*)$/m", "$key=$val", $env_contents); // set modifier to multiline for using ^$
}
file_put_contents(LARAVEL_ENV_FILE, $env_contents);
