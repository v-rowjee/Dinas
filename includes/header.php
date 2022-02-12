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

    <!-- JQueries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />

    <!-- Font Awesome icon -->
    <script src="https://kit.fontawesome.com/e529e97c19.js" crossorigin="anonymous"></script>

    <!-- XXX Owl Carousel 2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- XXX Date picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- XXX reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- My Styles -->
    <link rel="stylesheet" href="css/default.css" />
    
    <?php 
      if($active == "index") echo'<link rel="stylesheet" href="css/index.css" />';
      if($active == "menu") echo'<link rel="stylesheet" href="css/menu.css" />';
      if($active == "about") echo'<link rel="stylesheet" href="css/about.css" />';
      if($active == "order")  echo'<link rel="stylesheet" href="css/order.css" />';
      if($active == "reviews") echo'<link rel="stylesheet" href="css/reviews.css" />';
      if($active == "account") echo'<link rel="stylesheet" href="css/account.css" />';
      if($active == "reservation") echo'<link rel="stylesheet" href="css/reservation.css" />'; 
    ?>
    
  </head>
  <?php 
    if($active == "index")
      echo '<body data-bs-spy="scroll" data-bs-target="#spy-target" data-bs-offset="100">';
    else
      echo '<body>';
   ?>


