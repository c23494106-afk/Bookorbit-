<?php
include "db.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $input = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT username,password FROM users WHERE username=? OR email=?");
    $stmt->bind_param("ss",$input,$input);
    $stmt->execute();
    $stmt->bind_result($username,$hash);

    if($stmt->fetch()){
        if(password_verify($password,$hash)) echo "Login Successful! Welcome $username";
        else echo "Incorrect Password!";
    } else echo "User not found!";
}
?>
