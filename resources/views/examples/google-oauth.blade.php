<!DOCTYPE html>
<html lang="en-US" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Google OAuth</title>
    </head>
    <body>
    <h1>Google OAuth</h1>
@php
require_once base_path() . '/vendor/autoload.php';

$client = new Google\Client();
$client->setAuthConfig(config_path('google_client_secret.json'));

if (isset($_GET['code'])) {
    echo '<pre>';

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']); //$token = $client->authenticate($_GET['code']);
    print_r($token);

    // use service object to obtain user's email and info
    $service = new Google_Service_Oauth2($client);
    $user_info = $service->userinfo->get();
    print_r($user_info);
    
    echo '</pre>';
}

// Your redirect URI can be any registered URI, but in this example
// we redirect back to this same page
// e.g. $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$redirect_uri = 'http://' . '1.88.angusliu.com:9999' . $_SERVER['PHP_SELF']; // cannot use private IP
$client->setRedirectUri($redirect_uri);
$client->setState('my_state'); // store simple store e.g. redirect path?

$client->addScope('https://www.googleapis.com/auth/userinfo.email');
$client->addScope('https://www.googleapis.com/auth/userinfo.profile');

$authUrl = $client->createAuthUrl();

echo "<h3>AuthURL: $authUrl</h3>";

@endphp
    <button onclick="window.location.href='{{ $authUrl }}'">Google Login</button>
    </body>
</html>
