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

    // remove user's reservation
    $sql1 = "UPDATE users SET rid = NULL WHERE id = :id";
    $result1 = $conn->prepare($sql1);
    $result1->execute([
        ':id' => $_SESSION['id']
    ]);
    

    // set reservation status to cancelled
    $sql2 = "UPDATE reservation SET status = 'cancel' WHERE id = :id";
    $result2 = $conn->prepare($sql2);
    $result2->execute([
        ':id' => $_SESSION['rid']
    ]);

    // remove tables allocation in res_tab
    $sql3 = "DELETE FROM res_tab WHERE rid = :rid";
    $result3 = $conn->prepare($sql3);
    $result3->execute([
        ':rid' => $_SESSION['rid']
    ]);

    // unset session's reservation
    unset($_SESSION['rid']);

    // ask user to refresh page
    $msg = 'Reservation cancelled. Refresh page.';
}
?>

<div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        <div class="row justify-content-center align-items-center mb-5">
            <h6 class="gold">You already have a reservation</h6>
            <h1>Reservation Number <?php echo $res['id'] ?></h1> 

            <p>
                Your reservation has been set for <?php echo $res['time']."pm" ?> on <?php echo $show_date ?>.
                Tables have been reserved for a total of <?php echo $res['party_size'] ?> guests.
                If you wish to cancel your reservation please do so at least one hour before the reservation time by clicking on the cancel button below.
            </p></br>

            <div class="row justify-content-around align-items-center mt-5">
                <div class="col-10 col-md-3"><h5>Party Size: <?php echo $res['party_size'] ?></h5></div>
                <div class="col-10 col-md-3"><h5>Date: <?php echo $show_date ?></h5></div>
                <div class="col-10 col-md-3"><h5>Time: <?php echo $res['time']."pm" ?></h5></div>
                <div class="col-10 col-md-3"><input type="submit" name="cancel-reservation" class="btn btn-primary w-100" value="Cancel"></div>
                <div class="msg"><?php echo $msg ?></div>
            </div>

        </div>

    </form>
</div>