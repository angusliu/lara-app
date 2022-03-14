#!/usr/bin/env php
<?php
/* `composer create-project` is the same as:
    - cp .env.example .env
    - composer install
    - php artisan key:generate --ansi
//*/ 
$cmd =
<<<EOD
cd ../ && composer create-project
EOD;

echo "Command: $cmd\n";
system($cmd, $ret);
echo "Result: $ret\n";
