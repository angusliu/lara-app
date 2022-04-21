#!/usr/bin/env php
<?php
/*
packages:
https://github.com/googleapis/google-api-php-client
//*/
$cmd_lines = <<<EOD
cd ../ && composer require google/apiclient
EOD;

$cmds = explode("\n", $cmd_lines);
foreach($cmds as $cmd) {
    echo "Command: $cmd\n";
    system($cmd, $ret);
    echo "Result: $ret\n";

    if ( $ret ) break;
}
