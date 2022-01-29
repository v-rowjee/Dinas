<?php
require_once "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];

    $hash_password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $password = $hash_password;

    // Checking if username available
    $check_sql = "SELECT * FROM users WHERE username = :username";
    $handler = $conn->prepare($check_sql);

    $handler->bindParam(':username',$username);
    $handler->execute();   
    
    if($handler->rowCount()>0){

        echo "Username already exists";

    }else{

        $sql = "INSERT INTO users (username,password) VALUES (:username,:password)";
        $statement = $conn->prepare($sql);

        $statement->execute([
            ':username' => $username,
            ':password' => $password
        ]);

        echo "Thank you for registering";
    }

}

$conn == null;
