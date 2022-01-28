<?php
require_once "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $query = $conn->prepare("INSERT INTO users (username,password) VALUES (:username,:password)");
    $query->bindParam(':username',$username);
    $query->bindParam(':password',$password);

    $username = $_POST['username_'];
    $password = $_POST['password_'];
    
    $query->execute();

}

$conn == null;
