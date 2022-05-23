<?php
require 'google/vendor/autoload.php';
include 'includes/db_connect.php';

$clientID = '66337706486-a7dh1uhviacp9ujqumtcjm9eq25aaagf.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/Dinas/login.php';

//creating client request to google
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope('profile');
$client->addScope('email');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token["error"])){

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        $google_id = $google_account_info->id;
        $username = strtolower(str_replace(' ', '', $google_account_info->name));
        $password = password_hash('12345678',PASSWORD_DEFAULT);
        $name = $google_account_info->name;
        $email = $google_account_info->email;
        $phone = "";
        $is_admin = "no";

        // checking user already exists or not
        $sql2 = "SELECT * FROM users WHERE google_id = ?";
        $query2 = $conn->prepare($sql2);
        $query2->execute([$google_id]);
        $user = $query2->fetch(PDO::FETCH_ASSOC);

        if($query2->rowCount() > 0){
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['is_admin'] = $user['is_admin'];
            $_SESSION['google_id'] = $user['google_id'];
            header('Location: index.php');
            exit;
        }
        else{
            $sql2 = "SELECT * FROM users WHERE username = ?";
            $query2 = $conn->prepare($sql2);
            $query2->execute([$username]);
            if($query2->rowCount() > 0){
                header('Location: login.php');
                exit;
            }else{
                // if user not exists we will insert the user
                $sql = "INSERT INTO users(username,password,name,email,phone,is_admin,google_id) VALUES(:username,:password,:name,:email,:phone,:is_admin,:google_id)";
                $query = $conn->prepare($sql);
                $query->execute([
                    ':username' => $username,
                    ':password' => $password,
                    ':name' => $name,
                    ':email' => $email,
                    ':phone' => $phone,
                    ':is_admin' => $is_admin,
                    ':google_id' => $google_id
                ]);

                $id = $conn->lastInsertId();

                if($query->rowCount() > 0){
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['phone'] = $phone;
                    $_SESSION['is_admin'] = $is_admin;
                    header('Location: index.php');
                    exit;
                }
            }
        }

    }
    else{
        header('Location: login.php');
        exit;
    }

}