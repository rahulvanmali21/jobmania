<?php 
include("../../config/config.php");
if(isset($_POST["email"]) && isset($_POST["pass"]) && $_POST["email"]!="" && $_POST["pass"]!=""){
    $verifivation = login($_POST["email"],$_POST["pass"],$con);
    if($verifivation){
        $_SESSION["loggedInAP"] = $_POST["email"];
    } else{
        echo "wrong email and password";
    }
} else{
    echo "please enter all details";
}

function login($email,$pass,$con){
    $password = md5($pass);
    $loginQuery =mysqli_query($con,"SELECT * FROM applicant WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($loginQuery) == 1){
        return true;
    }else{
        return false;
    }
}

?>