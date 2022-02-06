<?php
include 'db_connect.php';


$size = 2;
$date = date("D, d M Y",strtotime("now"));
$msg = "";
$time = "5";

if (isset($_POST['submit-reservation'])) {

    $dateInput = $_POST['date'];
    $date = date("Y-m-d", strtotime($dateInput));

    $size = $_POST['size'];
    $tables_needed = ceil($size/2);

    $time = $_POST['time'];


    // check table avalaible at input date and time
    // get num of reservation(schedule table) at input date and time
    $sql = "SELECT * FROM schedule WHERE date = :date AND time = :time"; 
    $result = $conn->prepare($sql); 
    $result->execute([
        ':date' => $date,
        ':time' => $time
    ]); 
    $rows_schedule = $result->rowCount();

    // get num of tables 
    $sql2 = "SELECT * FROM tables "; 
    $result2 = $conn->prepare($sql2); 
    $result2->execute(); 
    $rows_tables = $result2->rowCount();

    if(($tables_needed+$rows_schedule) > $rows_tables) // if restaurant full when current reservation is added
        $msg = "Restaurant full at this time";

    else{
        // if table available, add 1 reservation add n schedules for n tid
        $sql3 = "INSERT INTO schedule (date, time, tid) VALUES (:date,:time,:tid)";
        $result3 = $conn->prepare($sql3);
        for($i=0; $i<$tables_needed; $i++){
            $result3->execute([
                ':date' => $date,
                ':time' => $time,
                ':tid' => $rows_schedule+1
            ]); 
        }
        $last_sid = $conn->lastInsertId();

        $sql4 = "INSERT INTO reservation (party_size,sid) VALUES (:size,:sid)";
        $result4 = $conn->prepare($sql4);
        $result4->execute([
            ':size' => $size,
            ':sid' => $last_sid
        ]);
        $msg = "Reservation successfull";
    }

    


}




?>