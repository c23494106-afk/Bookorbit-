<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $to = "c23494106@gmail.com";
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $subject = "New Contact Message from $name";
    $headers = "From: $email";

    if(mail($to,$subject,$message,$headers)) echo "Message Sent Successfully!";
    else echo "Failed to Send Message!";
}
?>
