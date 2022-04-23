<!DOCTYPE html>
<html lang="en-US" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Lara-App</title>
    </head>
    <body>
    <h1>Pusher Server with Javascript</h1>
    </body>
</html>
@php
// setting up pusher:
// 1. composer require pusher/pusher-php-server
// 2. .env 
// $cfg['BROADCAST_DRIVER'] = 'pusher';
// $cfg['PUSHER_APP_ID'] = '1388424';
// $cfg['PUSHER_APP_KEY'] = 'bb952477740f0b10db2c';
// $cfg['PUSHER_APP_SECRET'] = '7d44ea6ab235bfd044e5';
// $cfg['PUSHER_APP_CLUSTER'] = 'ap3';

/*
// send event via php
require_once base_path() . '/vendor/autoload.php';

$options = array(
  'cluster' => 'ap3',
  'useTLS' => true
);
$pusher = new Pusher\Pusher(
  'bb952477740f0b10db2c',
  '7d44ea6ab235bfd044e5',
  '1388424',
  $options
);

$data['message'] = 'hello world';
$pusher->trigger('my-channel', 'my-event', $data);
//*/

///*
// send event via php-laravel
use App\Events\MyEvent;

event(new MyEvent('hello world'));
//*/
@endphp