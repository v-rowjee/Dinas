<?php 
  ob_start();
  $active = "reservation";
  include 'includes/header.php';
  
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


<?php 
include 'includes/footer.php';
ob_end_flush();
?>