#!/usr/bin/env php
<?php
$cmd_lines = <<<EOD
cd ../ && composer require encore/laravel-admin
cd ../ && php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
cd ../ && php artisan admin:install
cd ../ && php artisan db:seed --class=AdminTablesSeeder
EOD;

$cmds = explode("\n", $cmd_lines);
foreach($cmds as $cmd) {
    echo "Command: $cmd\n";
    system($cmd, $ret);
    echo "Result: $ret\n";

    if ( $ret ) break;
}
