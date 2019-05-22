<?php
ob_start();
session_start();
$timezone = date_default_timezone_set("Asia/Kolkata");
$con = mysqli_connect("localhost","root","","jobmania");
$gmail_emailID = "your gmail";
$gmaill_password = "your password";
if(mysqli_connect_errno()){
    echo "Failed to connect" . mysqli_connect_errno();
}
?>
