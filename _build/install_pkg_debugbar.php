#!/usr/bin/env php
<?php
/*
packages:
https://github.com/barryvdh/laravel-debugbar
//*/
$cmd_lines = <<<EOD
cd ../ && composer require barryvdh/laravel-debugbar
EOD;

$cmds = explode("\n", $cmd_lines);
foreach($cmds as $cmd) {
    echo "Command: $cmd\n";
    system($cmd, $ret);
    echo "Result: $ret\n";

    if ( $ret ) break;
}
