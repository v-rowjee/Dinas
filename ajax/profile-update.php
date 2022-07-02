<?php
session_start();
include '../config/db_connect.php';

if(isset($_POST['username'])){

    $msg = '';
    
    $username = strtolower($_POST['username']);
    $password_old = $_POST['password_old'];
    $password_new = $_POST['password_new'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql_p = "SELECT password FROM users WHERE id =?";
    $query_p = $conn->prepare($sql_p);
    $query_p->execute([$_SESSION['id']]);
    $password_db = $query_p->fetchColumn();

    // verify if password entered correctly
    if(password_verify($password_old,$password_db)){

        if($username != $_SESSION['username']){ // username changed
            $sql_v = "SELECT * FROM users WHERE username = ?";
            $query_v = $conn->prepare($sql_v);
            $query_v->execute([$username]);
            $rowCount = $query_v->rowCount();
            if($rowCount > 0){  //username already taken
                $msg = "Username taken";
                echo $msg;
                exit;
            }
        }

        // check if user in changing password too, if new password empty = No
        if(empty($_POST['password_new'])){
            $sql_u = "UPDATE users SET username = :username, name = :name, phone = :phone, email = :email WHERE id = :id";
            $query_u = $conn->prepare($sql_u);
            $query_u->execute([
                ':username' => $username,
                ':name' => $name,
                ':email' => $email,
                ':phone' => $phone,
                ':id' => $_SESSION['id']
            ]);
            $msg = "";
        }
        else{
            $password_new_hashed = password_hash($password_new,PASSWORD_DEFAULT);
            $sql_u = "UPDATE users SET username = :username, name = :name, phone = :phone, email = :email, password = :password WHERE id = :id";
            $query_u = $conn->prepare($sql_u);
            $query_u->execute([
                ':username' => $username,
                ':name' => $name,
                ':email' => $email,
                ':phone' => $phone,
                ':password' => $password_new_hashed,
                ':id' => $_SESSION['id']
            ]);
            $msg = "";
        }

    }
    else{
        $msg = "Incorrect Password";
    }

    // if there is no error we change the session variable
    if($msg == ''){
        $sql_s = "SELECT * FROM users WHERE id = ?";
        $query_s = $conn->prepare($sql_s);
        $query_s->execute([$_SESSION['id']]);
        $user = $query_s->fetch(PDO::FETCH_ASSOC);

        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['is_admin'] = $user['is_admin'];
        $_SESSION['google_id'] = $user['google_id'];

        $msg = "Profile Updated";
    }
    
    echo $msg;
    exit;
}

echo "error";
exit;