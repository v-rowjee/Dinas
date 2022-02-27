<?php 
session_start();
if($_SESSION['is_admin'] != 'yes'){ header('location: ../index.php'); die();}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" />

    <!-- BoxIcons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
 
    <!-- My Styles -->
    <link rel="stylesheet" href="css/default.css" />
    <link rel="stylesheet" href="css/sidenav.css" />
    <link rel="stylesheet" href="css/styles1.css">

    <?php if($active == 'menu') echo '<link rel="stylesheet" href="css/menu.css" />' ?>
    
  </head>

<?php include 'sidenav.php' ?>