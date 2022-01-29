<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dina's</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />

    <!-- Font Awesome icon -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- JQueries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- My Styles -->
    <link rel="stylesheet" href="css/default.css" />
    
    <?php 
      if($active == "index") echo'<link rel="stylesheet" href="css/index.css" />';
      if($active == "menu") echo'<link rel="stylesheet" href="css/menu.css" />';
      if($active == "about-us") echo'<link rel="stylesheet" href="css/about.css" />';
      if($active == "online-order")  echo'<link rel="stylesheet" href="css/online_order.css" />';
      if($active == "reviews") echo'<link rel="stylesheet" href="css/reviews.css" />';
      if($active == "account") echo'<link rel="stylesheet" href="css/account.css" />'; 
    ?>
    
  </head>
  <?php 
    if($active == "index")
      echo '<body data-bs-spy="scroll" data-bs-target="#spy-target" data-bs-offset="100">';
    else
      echo '<body>';
   ?>


