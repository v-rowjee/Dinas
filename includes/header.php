<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dina's <?php if(isset($active)) echo ucfirst($active) ?></title>

    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- JQueries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />

    <!-- Font Awesome icon -->
    <script src="https://kit.fontawesome.com/e529e97c19.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- AOS animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Soundcloud -->
    <!-- <script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script> -->

    <!-- My Styles -->
    <link rel="stylesheet" href="css/default.css" />
    
    <?php 
      if($active == "home") echo'<link rel="stylesheet" href="css/index.css" />';
      if($active == "menu") echo'<link rel="stylesheet" href="css/menu.css" />';
      if($active == "about") echo'<link rel="stylesheet" href="css/about.css" />';
      if($active == "order")  echo'<link rel="stylesheet" href="css/order.css" />';
      if($active == "reviews") echo'<link rel="stylesheet" href="css/reviews.css" />';
      if($active == "account") echo'<link rel="stylesheet" href="css/account.css" />';
      if($active == "reservation") echo'<link rel="stylesheet" href="css/reservation.css" />'; 
    ?>
    
  </head>
  <body>
    <!-- <div id="cursor"></div> -->


    <div id="preloader"></div>

<?php 

  if(isset($_SESSION['id'])){
    
    include 'config/db_connect.php';

    $sql = "SELECT id FROM reservation WHERE uid=? AND status<>'check-out'";
    $statement = $conn->prepare($sql);
    $statement->execute([$_SESSION['id']]);
    $res = $statement->fetch(PDO::FETCH_ASSOC);

    if($statement->rowCount() > 0)
      $_SESSION['rid'] = $res['id'];
    else
      unset($_SESSION['rid']);
  }
    

include 'navbar.php';
?>


