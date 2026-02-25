<?php
include "db.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("SELECT password FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($hash);

    if($stmt->fetch()){
        echo "Your hashed password is: $hash <br> You can reset it after login.";
    } else echo "Email not found!";
}
?>
