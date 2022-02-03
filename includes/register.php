<?php
require_once "db_connect.php";

$username = $password = $name = $email = $phone = "";
$usernameErr = $passwordErr = $nmaeErr = $emailErr = $phoneErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //validating username
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
    else{
        $password = $_POST['password'];
        $password = filter($password);

        $password = password_hash($password,PASSWORD_DEFAULT);
    }


    // validating name
    if(empty($_POST['name']))
        $nameErr = "* Required field";
    else{
        $name = filter($_POST['name']);
        if(!preg_match("/[a-zA-Z\s]/",$name))
            $nameErr = "* Only letters and white space allowed";
    }

    // validating email
    if(empty($_POST['email']))
        $emailErr = "* Required field";
    else{
        $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    }
    // validating phone
    if(empty($_POST['phone']))
        $phoneErr = "* Required field";
    else{
        $phone = filter($_POST['phone']);
        if(!preg_match("/[\+\s0-9]{7,}/",$phone))
            $phoneErr = "* Invalid format";
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

            $sql = "INSERT INTO users (username,password,name,email,phone) VALUES (:username,:password,:name,:email,:phone)";
            $statement = $conn->prepare($sql);

            $statement->execute([
                ':username' => $username,
                ':password' => $password,
                ':name' => $name,
                ':email' => $email,
                ':phone' => $phone
            ]);

            echo "Thank you for registering";

            header('location: ../login.php?u='.$username);
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
