<?php
session_start();
require_once "db_connect.php";

$username = $password = "";
$usernameErr = $passwordErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if(empty($_POST['username']))
        $usernameErr = "Username is required";
    else
        $username = filter($_POST['username']);

    if(empty($_POST['password']))
        $passwordErr = "Password is required";
    else
        $password = filter($_POST['password']);


    $sql = "SELECT * FROM users WHERE username = :username";
    $statement = $conn->prepare($sql);

    $statement->bindParam(':username',$username);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user['username']) {

        $hashed_password = $user['password'];

        if (password_verify($password,$hashed_password)) {
            
            $_SESSION['username']=$username;
            header("location: ../index.php");

        } else
            echo "Login Failed (p)";
    } else
        echo "Login Failed (u)";
}

function filter($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn == null;
