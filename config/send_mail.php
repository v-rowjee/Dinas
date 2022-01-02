<?php
$to = "vedrowjee@gmail.com";
$subject = "Getting In Touch";
$txt = '"' . $_POST["message"] . ' \nFrom ' . $_POST["name"] . '"';
$headers = "From: " . $_POST["email"] . "";

mail($to, $subject, $txt, $headers);
