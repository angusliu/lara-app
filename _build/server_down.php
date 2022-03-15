#!/usr/bin/env php
<?php
define('LARAVEL_ROOT', realpath('../'));

$server_php_file = LARAVEL_ROOT . DIRECTORY_SEPARATOR . 'server.php';
$server_pid_file = realpath('./temp') . DIRECTORY_SEPARATOR . 'server.pid';

$pid = 0;
$kill_signal = 'TERM'; // equals 15 or 'KILL' equals 9 for process termination

// if server.pid is not found, assuming the server is not running
if ( !file_exists($server_pid_file) ) {
    $output = "$pid '$server_pid_file' not found. Server is not running!\n";
    fwrite(STDOUT, $output) && exit(0);
}

// if PID is NOT valid
$pid = intval(file_get_contents($server_pid_file));
if ( !$pid ) {
    $output = "$pid server PID not found!\n";
    fwrite(STDERR, $output) && exit(-1); 
} 

// kill -15 <server PID> and remove $server_pid_file
echo
<<<EOD
Killing server... @PID: $pid @SIGNAL: $kill_signal\n
EOD;

$cmd_lines =
<<<EOD
kill -s $kill_signal $pid
rm -f $server_pid_file
EOD;

$cmds = explode("\n", $cmd_lines);
foreach($cmds as $cmd) {
    system($cmd, $ret);

    if ( $ret ) {
        fwrite(STDERR, "$ret failed command: $cmd\n") && exit($ret); 
        break;
    }
}
    

