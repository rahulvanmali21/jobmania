<?php 
if(isset($_POST["registerAP"])){
$name = $_POST["a_name"];
$email = $_POST["a_email"];
$password = $_POST["a_password"];
$c_password = $_POST["a_password_confirm"];

$verification = $applicant->register($name,$email,$password,$c_password);
if($verification){
    $_SESSION["loggedInAP"] = $email;
    header("Location:resume.php");
}
}
?>
