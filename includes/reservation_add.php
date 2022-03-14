<?php
include 'db_connect.php';

//default variables
$size = 2;
$date = date("D, d M Y",strtotime("now"));
$time = "5";
$msg = "";

if (isset($_POST['submit-reservation'])) {

    if(!isset($_SESSION['id'])){
        header('location: login.php');
        die();
    }else{

    $dateInput = $_POST['date'];
    $date = date("Y-m-d", strtotime($dateInput));   // set format of date

    $size = $_POST['size'];
    $tables_needed = ceil($size/2);     // a table can have 1 or 2 person

    $time = $_POST['time'];

    // get num of reservation at input date and time
    $sql1 = "SELECT * FROM res_tab WHERE rid = (SELECT id FROM reservation WHERE date = :date AND time = :time AND status in('booked','approved'))"; 
    $result1 = $conn->prepare($sql1); 
    $result1->execute([
        ':date' => $date,
        ':time' => $time
    ]); 
    $num_of_reservations = $result1->rowCount();

    // get num of tables 
    $sql2 = "SELECT * FROM tables "; 
    $result2 = $conn->prepare($sql2); 
    $result2->execute(); 
    $num_of_tables = $result2->rowCount();

    if(($tables_needed+$num_of_reservations) > $num_of_tables) // if num of table not enough(restaurant full) when current reservation is added
        $msg = "Restaurant full at this time";

    else{
        // if table available, add a new reservation
        $sql5 = "INSERT INTO reservation (uid,party_size,date,time,status) VALUES (:uid,:size,:date,:time,:status)";
        $result5 = $conn->prepare($sql5);
        $result5->execute([
            ':uid' => $_SESSION['id'],
            ':size' => $size,
            ':date' => $date,
            ':time' => $time,
            ':status' => 'booked'
        ]);
        // set session rid
        $_SESSION['rid'] = $conn->lastInsertId();

        // put n rows for n table needed
        $sql3 = "INSERT INTO res_tab (rid, tid) VALUES (:rid,:tid)";
        $result3 = $conn->prepare($sql3);
        
        for($i=0; $i < $tables_needed; $i++){
            $result3->execute([
                ':rid' => $_SESSION['rid'],
                ':tid' => $num_of_reservations+1+$i
            ]); 
        }
        
        // put reservation on customer
        // $sql4 = "UPDATE users SET rid = :rid WHERE id = :id";
        // $result4 = $conn->prepare($sql4);
        // $result4->execute([
        //     ':rid' => $_SESSION['rid'],
        //     ':id' => $_SESSION['id']
        // ]);

        // redirect 
        header("Refresh:0; url=index.php#reservation");
        die();
        
    }
  }
}
?>

<div class="row justify-content-center align-items-center mb-5">
    <div class="col-8">
    <h6 class="gold">Book a table now.</h6>
    <h1>Reservation</h1>
    <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Repudiandae temporibus id quaerat. Tenetur magnam aperiam debitis
        delectus eveniet. Architecto iste nihil esse tempora. Numquam
        natus dolorum dolor, rerum obcaecati facilis.
    </p>
    </div>
</div>

<form action="reservation.php" method="post">
    <div class="row justify-content-center g-3 mx-5">
        <div class="col-12 col-lg-3 text-start">
            <label class="ms-1">Party size</label>
            <input
            type="number"
            name="size"
            class="form-control"
            min="1"
            value="2"
            required
            />
        </div>
        <div class="col-12 col-lg-3 text-start">
            <label class="ms-1">Date</label>
            <input
            type="date"
            name="date"
            id="datepicker"
            class="form-control datepicker"
            value="<?php echo $date ?>"
            required
            />
        </div>
        
        <div class="col-12 col-lg-3 text-start">
            <label class="ms-1">Time</label>
            <select class="form-select" name="time">
            <option value="5" <?=$time == '5' ? ' selected="selected"' : '';?>>5pm</option>
            <option value="6" <?=$time == '6' ? ' selected="selected"' : '';?>>6pm</option>
            <option value="7" <?=$time == '7' ? ' selected="selected"' : '';?>>7pm</option>
            <option value="8" <?=$time == '8' ? ' selected="selected"' : '';?>>8pm</option>
            <option value="9" <?=$time == '9' ? ' selected="selected"' : '';?>>9pm</option>
            <option value="10" <?=$time == '10' ? ' selected="selected"' : '';?>>10pm</option>
            </select>
        </div>
        <div class="col-12 col-lg-3">
            <label></label>
            <input
            type="submit"
            name="submit-reservation"
            class="btn btn-outline-primary w-100"
            value="Reserve Now"
            />
        </div>
    </div>
    <div class="row">
    <p class="msg mt-5"><?php echo $msg ?></p>
    </div>
</form>