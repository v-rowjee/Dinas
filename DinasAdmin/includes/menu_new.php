<?php 
include 'db_connect.php';

$sql3 = "INSERT INTO menu (name,price,caption,category,img) VALUES ('','','','','default.png') ";
$query3 = $conn->prepare($sql3);
$query3->execute();

$newID = $conn->lastInsertId();

header('location: ../menu.php?id='.$newID);
