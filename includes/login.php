<?php
session_start();
require_once "db_connect.php";

$username = $password = "";
$usernameErr = $passwordErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // validating username
    if(empty($_POST['username']))
        $usernameErr = "* Username is required";
    else{
        $username = filter($_POST['username']);
        if(!preg_match("/[a-zA-Z0-9]/",$username))
            $usernameErr = "* Only letters and numbers allowed";
    }
        

    // validating password
    if(empty($_POST['password']))
        $passwordErr = "* Password is required";
    else
        $password = filter($_POST['password']);


    if($usernameErr=="" && $passwordErr==""){ // if no error...

        $sql = "SELECT * FROM users WHERE username = :username";
        $statement = $conn->prepare($sql);

        $statement->bindParam(':username',$username);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user['username']) {    // if username exist

            $hashed_password = $user['password'];

            if (password_verify($password,$hashed_password)) { // if password correct
                
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['phone'] = $user['phone'];

                if($user['is_admin']=='yes') // admin
                    header('location: ../admin/dashboard.html');
                else // normal user
                    header('location: ../index.php?id='.$user['id']);

            } else
                echo "Login Failed (p)";
        } else
            echo "Login Failed (u)";
    }
}

function filter($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn == null;
