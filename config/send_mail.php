<?php

$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //validate name
    if(empty($_POST['name']))
        $nameErr = "* Name is required";
    else{
        $name = filter($_POST['name']);
        if(!preg_match("/[a-zA-Z0-9]/",$name))
            $nameErr = "* Only letters and numbers allowed";
    }

    // validate email
    if(empty($_POST['email']))
        $emailErr = "* Email is required";
    else{
        $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    }

    // validate message
    if(empty($_POST['message']))
        $messageErr = "* Message is required";
    else{
        $message = filter($_POST['message']);
    }

    // if no errors send mail
    if($nameErr=="" && $emailErr=="" && $messageErr==""){
        
        $subject = "Feedback from ".$name;
        $to = "dinasrestaurant.test@gmail.com";
        $to = filter_var($to,FILTER_VALIDATE_EMAIL);
        $header = "From: $name <$email>";
        $header .= "Reply-To: $email \r\n";

        // send mail
        mail($to,$subject,$message,$header);

        echo "Email sent successfully. Thank You for messaging us.";

    }
    else
    {
        echo "There was an error sending feedback.";
    } 
}

function filter($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>