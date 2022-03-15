#!/usr/bin/env php
<?php
require_once(__DIR__ . '/../vendor/autoload.php');

define('LARAVEL_ROOT', realpath(__DIR__ . '/../'));

$server_host = '0.0.0.0'; // default hostname or address
$server_port = 8000; // default port
$server_desc = 'default';
$server_pid_file = __DIR__ . '/server.pid';
$server_log_file = __DIR__ . '/server.log';
$server_php_file = LARAVEL_ROOT . '/server.php';

$pid = 0;

// if server.pid is found, quit running server again
if ( file_exists($server_pid_file) ) {
    $pid = intval(file_get_contents($server_pid_file));
    if ( $pid ) {
        $output = "$pid Server is already running!\n";
        fwrite(STDOUT, $output) && exit(0);        
    }
}

// load LARAVEL_ROOT/.env as an array
$env = Dotenv\Dotenv::createArrayBacked(LARAVEL_ROOT)->load();
if ( !is_array($env) )
    fwrite(STDERR, "Cannot find environment object in folder '" . LARAVEL_ROOT . "'!\n") && exit(-1);

$app_url = isset($env['APP_URL'])?trim($env['APP_URL']):'';
if ( $app_url && preg_match('/.*:(\d+)/', $app_url, $matches) ) {
    $server_port = intval($matches[1]);
    $server_desc = '.env APP_URL';
}

// start server with nohup in the background, ignore errors
$laravel_root = LARAVEL_ROOT;
$cmd =
<<<EOD
cd $laravel_root && nohup php artisan serve --host={$server_host} --port={$server_port} > {$server_log_file} 2>&1 &
EOD;

system($cmd, $ret);

// get server PID
$cmd = __DIR__ . '/server_pid.php';

$pid = 0;
exec($cmd, $out, $ret);
$pid = $out?intval($out[0]):0;
if ( $pid ) {
    $output = "Server is running... @Listen: $server_host:$server_port ($server_desc) @Log: $server_log_file\n";
    $output .= implode("\n", $out) . "\n";
    fwrite(STDOUT, $output) && exit(0);
}
else {
    $output = "$pid Error! Cannot get PID from running server!\n";
    fwrite(STDERR, $output) && exit(-1); 
}
