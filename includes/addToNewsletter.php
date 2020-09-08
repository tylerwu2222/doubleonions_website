<?php
require 'dbh.php';
session_start();
$nlEmail = $_POST['nlEmail'];

// if invalid email..
if(!filter_var($nlEmail, FILTER_VALIDATE_EMAIL)){
    if(isset($_SESSION["prev-pg"])){
        echo "<script>alert('Invalid email');window.location.href='..$prevPg?error=invalid_email'</script>";
    	exit();
    }
}

// if email not already on email list (count = 0), add to db
$sql = "SELECT 1 FROM newsletter WHERE email = '$nlEmail'";
$result = $conn->query($sql);
$prevPg = strval($_SESSION["prev-pg"]);
if ($result->num_rows == 0) {
    $sql = "INSERT INTO newsletter (email) VALUES ('$nlEmail') ";
    $conn->query($sql);
    if(isset($_SESSION["prev-pg"])){
        echo "<script>alert('Your email was added'); window.location.href='..$prevPg'</script>";
        exit();
    }
}

//email already exists
else{
    if(isset($_SESSION["prev-pg"])){
    	echo "<script>alert('Email already in newsletter'); window.location.href='..$prevPg'</script>";
    	exit();
    }
}
header("Location:../index.php");
exit();
?>