<?php
    // use sessions
    session_start();
 
    // include google API client
    require "../vendor/autoload.php";
    include "db_connect.php";
     
    // set google client ID
    $google_oauth_client_id = "66337706486-4iapsrv46e3uo9mpslthqgeh0ukst225.apps.googleusercontent.com";
 
    // create google client object with client ID
    $client = new Google_Client([
        'client_id' => $google_oauth_client_id
    ]);
 
    // verify the token sent from AJAX
    $id_token = $_POST["id_token"];
 
    $payload = $client->verifyIdToken($id_token);
    if ($payload && $payload['aud'] == $google_oauth_client_id)
    {
        // get user information from Google
        $user_google_id = $payload['sub'];
        $name = $payload["name"];
        $email = $payload["email"];

        // default for new account
        $username = strtolower(str_replace(' ', '', $name));
        $password = password_hash('12345678',PASSWORD_DEFAULT);
        $phone = null;
        $is_admin = "no";
 
        // login the user
        // checking user already exists or not
        $sql = "SELECT * FROM users WHERE google_id = ?";
        $query = $conn->prepare($sql);
        $query->execute([$user_google_id]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // user exist so sign in
        if($query->rowCount() > 0){
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['is_admin'] = $user['is_admin'];
            $_SESSION['google_id'] = $user['google_id'];
            header('Location: /dinas/');
            exit;
        }
        // user do not exist so create new account
        else{
            // check if username already exist
            $sql2 = "SELECT * FROM users WHERE username = ?";
            $query2 = $conn->prepare($sql2);
            $query2->execute([$username]);
            if($query2->rowCount() > 0){
                $username = $username . $user['id'];
            }
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
                ':google_id' => $user_google_id
            ]);

            $id = $conn->lastInsertId();

            if($query->rowCount() > 0){
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $phone;
                $_SESSION['is_admin'] = $is_admin;
                header('Location: /dinas/profile.php');
                exit;
            }
            
        }
 
        // send the response back to client side
        echo "<script>window.reload();</script>";
    }
    else
    {
        // token is not verified or expired
        echo  "<script>alert('Error with token');</script>";
    }
?>