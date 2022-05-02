#!/usr/bin/env php
<?php
/*
packages:
https://github.com/laravel/socialite
official:
https://laravel.com/docs/9.x/socialite
https://socialiteproviders.com/
docs:
https://laravel.com/docs/9.x/socialite#introduction

//*/
$cmd_lines = <<<EOD
cd ../ && composer require laravel/socialite
cd ../ && composer require socialiteproviders/zoho
cd ../ && composer require socialiteproviders/line
EOD;

$cmds = explode("\n", $cmd_lines);
foreach($cmds as $cmd) {
    echo "Command: $cmd\n";
    system($cmd, $ret);
    echo "Result: $ret\n";

    if ( $ret ) break;
}
