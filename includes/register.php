<?php
require_once "db_connect.php";

$username = $password = "";
$usernameErr = $passwordErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if(empty($_POST['username']))
        $usernameErr = "* Username is required";
    else{
        $username = filter($_POST['username']);
        if(!preg_match("/[a-zA-Z0-9]/",$username))
            $usernameErr = "* Only letters and numbers allowed";
    }
        

    if(empty($_POST['password']))
        $passwordErr = "* Password is required";
    else{
        $password = $_POST['password'];
        $password = filter($password);

        $password = password_hash($password,PASSWORD_DEFAULT);
    }
        
    // Checking if username available
    $check_sql = "SELECT * FROM users WHERE username = :username";
    $handler = $conn->prepare($check_sql);

    $handler->bindParam(':username',$username);
    $handler->execute();   
    
    if($handler->rowCount()>0){

        $usernameErr = "* Username already exists";
        echo $usernameErr;

    }else{

        if($usernameErr=="" && $passwordErr==""){ // if no error

            $sql = "INSERT INTO users (username,password) VALUES (:username,:password)";
            $statement = $conn->prepare($sql);

            $statement->execute([
                ':username' => $username,
                ':password' => $password
            ]);

            echo "Thank you for registering";
            header('location: ../index.php');
        }
    }

}

function filter($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn == null;
