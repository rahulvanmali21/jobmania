<?php 
include("../../config/config.php");

if(isset($_POST["name"]) && isset($_POST["pass"]) && $_POST["name"]!="" && $_POST["pass"]!=""){
    $verifivation = login($_POST["name"],$_POST["pass"],$con);
    if($verifivation){
        $_SESSION["loggedInEN"] = $_POST["name"];
    } else{
        echo "wrong username and password";
    }
} else{
    echo "please enter all details";
}

function login($name,$pass,$con){
    $password = md5($pass);
    $loginQuery =mysqli_query($con,"SELECT * FROM enterprise WHERE name='$name' AND password='$password'");
    if(mysqli_num_rows($loginQuery) == 1){
        return true;
    }else{
        return false;
    }
}

?>