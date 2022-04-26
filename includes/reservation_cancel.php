<?php
include 'db_connect.php';

$msg = "";

$sql = "SELECT * FROM reservation WHERE id = :id";
$result = $conn->prepare($sql);
$result->execute([':id'=>$_SESSION['rid']]);
$res = $result->fetch(PDO::FETCH_ASSOC);

//setting user friendly date format
$show_date = date("D, d M Y", strtotime($res['date']));  

if(isset($_POST['cancel-reservation'])){
    
    // delete reservation
    $sql2 = "DELETE FROM reservation WHERE id = ?";
    $result2 = $conn->prepare($sql2);
    $result2->execute([$_SESSION['rid']]);

    // remove tables allocation in res_tab
    $sql3 = "DELETE FROM res_tab WHERE rid = ?";
    $result3 = $conn->prepare($sql3);
    $result3->execute([$_SESSION['rid']]);

    // unset session's reservation
    unset($_SESSION['rid']);

    // redirect page
    header("Refresh:0; url=index.php#reservation");
    die();
}
?>

<form action="reservation.php" method="post">

    <div class="row justify-content-center align-items-center mb-5">
        <h6 class="text-gold">You already have a reservation</h6>
        <h1>Reservation Number <?php echo $res['id'] ?></h1> 

        <p class="mb-5">
            Your reservation has been set for <?php echo $res['time']."pm" ?> on <?php echo $show_date ?>.
            Tables have been reserved for a total of <?php echo $res['party_size'] ?> guests.
            If you wish to cancel your reservation please do so at least one hour before the reservation time by clicking on the cancel button below.
        </p>

        <div class="card bg-grey shadow" data-aos="zoom-in-up" data-aos-anchor-placement="top-bottom">
            <div class="card-body">
                <div class="row justify-content-around align-items-center mt-5">
                    <div class="col-10 col-md-3"><h5>Party Size: <?php echo $res['party_size'] ?></h5></div>
                    <div class="col-10 col-md-3"><h5>Date: <?php echo $show_date ?></h5></div>
                    <div class="col-10 col-md-3"><h5>Time: <?php echo $res['time']."pm" ?></h5></div>
                    <div class="col-10 col-md-3"><input type="submit" name="cancel-reservation" class="btn btn-outline-primary w-100" value="Cancel"></div>
                    <div class="msg"><?php echo $msg ?></div>
                </div>
            </div>
        </div>

    </div>

</form>