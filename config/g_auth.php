<?php
require_once 'google_auth/vendor/autoload.php';

$clientID = '66337706486-a7dh1uhviacp9ujqumtcjm9eq25aaagf.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/Dinas/index.php';

//creating client request to google
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope('profile');
$client->addScope('email');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    //getting User Profile
    $gauth = new Google_Service_Oauth2($client);
    $google_info = $gauth->userinfo->get();
    $email = $google_info->email;   //email
    $name = $google_info->name;     //name
    /*
    echo "Welcome " . $name . ".";
    echo "<br>";
    echo "You are registed using email: " . $email . ".";
    echo "<br>";
    echo "<a href='" . $redirectUri . "'>Log out</a>";
*/
}
