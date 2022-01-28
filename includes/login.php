<?php
require_once "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";

    $result = $conn->query($query);

    $userResult = $result->fetch(PDO::FETCH_ASSOC);

    if ($userResult['username']) {
        if ($password == $userResult['password']) {
            $_SESSION['username']=$username;
            header("location: ../index.php");
        } else
            echo "Login Failed (p)";
    } else
        echo "Login Failed (u)";
}

$conn == null;
