<?php 
  ob_start();
  $active = "reservation";
  include 'includes/header.php';
  include 'includes/navbar.php';
?>

<section id="reservation">
  <div class="container text-center">
    <?php 
    
    if(!isset($_SESSION['rid']))
      include 'includes/reservation_add.php';
    else
      include 'includes/reservation_cancel.php';
    
    ?>
  </div>
</section>


<?php include 'includes/footer.php' ?>