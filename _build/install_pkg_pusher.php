#!/usr/bin/env php
<?php
/*
packages:
https://www.pusher.com
example:
https://github.com/pusher/pusher-http-php
https://github.com/pusher/pusher-http-laravel
//*/
$cmd_lines = <<<EOD
cd ../ && composer require pusher/pusher-php-server
EOD;

$cmds = explode("\n", $cmd_lines);
foreach($cmds as $cmd) {
    echo "Command: $cmd\n";
    system($cmd, $ret);
    echo "Result: $ret\n";

    if ( $ret ) break;
}
