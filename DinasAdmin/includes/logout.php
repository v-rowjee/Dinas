<?php
session_start();
session_destroy();
header("location: /dinas/index.php");
die();
?>