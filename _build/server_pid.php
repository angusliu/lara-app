#!/usr/bin/env php
<?php
define('LARAVEL_ROOT', realpath('../'));

$server_php_file = LARAVEL_ROOT . DIRECTORY_SEPARATOR . 'server.php';
$server_pid_file = realpath('./temp') . DIRECTORY_SEPARATOR . 'server.pid';

$cmd =
<<<EOD
ps a | grep $server_php_file | grep -v grep
EOD;

// calculate timeout ourselves, because set_time_limit() or ini_set('max_execution_time', $sec)
// doesn't count for system call like sleep() in linux.
$time_to_wait = 3.0; // seconds
$time_start = microtime(true);
$time_expired = $time_start + $time_to_wait;

$out = array();
$pid = 0;
while ( microtime(true) < $time_expired ) {
    exec($cmd, $out, $ret);
    $pid = $out?intval($out[0]):0;
    
    if ( $pid )
        break;

    usleep(100 * 1000); // sleep interval = 0.1 sec
}

$time_lapsed = microtime(true) - $time_start;
if ( !$pid ) {
    @unlink($server_pid_file);
    fwrite(STDERR, "$pid Get PID failed! (Time lapsed: $time_lapsed sec)\n") && exit(-1);
}

// output result matched
foreach($out as $i => $line) {
    $out[$i] = trim($line);
}
$output = implode("\n", $out) . "\n";
echo $output;

// write pid to file
file_put_contents($server_pid_file, "$pid\n");
