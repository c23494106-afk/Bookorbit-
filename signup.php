<?php
include "db.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);

    if($password !== $cpassword) die("Passwords do not match!");

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT id FROM users WHERE username=? OR email=?");
    $stmt->bind_param("ss",$username,$email);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0) die("Username or Email already exists!");

    $stmt = $conn->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");
    $stmt->bind_param("sss",$username,$email,$hash);
    if($stmt->execute()) echo "Sign-Up Successful! <a href='index.html'>Login Now</a>";
    else echo "Error: ".$stmt->error;
}
?>
