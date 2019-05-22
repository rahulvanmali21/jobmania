<?php 
if(isset($_POST["registerENT"])){
    $name = $_POST["e_name"];
    $email = $_POST["e_email"];
    $password = $_POST["e_password"];
    $password2 = $_POST["e_password_confirm"];
    $verify = $enterpriseAcc->register($name,$email,$password,$password2);
    if($verify){
        $_SESSION["loggedInEN"] = $name;
        header("Location:profile.php");
    }
}
?>