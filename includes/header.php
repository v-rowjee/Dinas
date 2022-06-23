<?php
session_start();
$google_oauth_client_id = "66337706486-4iapsrv46e3uo9mpslthqgeh0ukst225.apps.googleusercontent.com";
$google_oauth_client_secret = "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";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dina's <?php if(isset($active)) echo ucfirst($active) ?></title>

    <link rel="icon" type="image/x-icon" href="/dinas/favicon.ico">

    <!-- JQueries -->
    <script src="/dinas/js/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />

    <!-- Font Awesome icon -->
    <script src="https://kit.fontawesome.com/e529e97c19.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- AOS animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


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

    <div id="cursor"></div>

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
  
  }else{ ?>
    <!-- display the login prompt -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <div id="g_id_onload"
        data-client_id="<?php echo $google_oauth_client_id; ?>"
        data-context="signin"
        data-callback="googleLoginEndpoint"
        data-close_on_tap_outside="false"
        data-prompt_parent_id="g_id_onload"
        style="position: absolute; top: calc(60px + 2rem); right: calc(400px + 2rem);
            width: 0; height: 0; z-index: 1001;">
    </div>
  <?php }
    

include 'navbar.php';
?>


