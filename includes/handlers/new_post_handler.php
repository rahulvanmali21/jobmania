<?php
$error = false;
$errorMsg = "";
if(isset($_POST["postJobBtn"])){
    $title = $_POST["j_title"];
    $postion = $_POST["j_postion"];
    $location = $_POST["j_location"];
    $enterprise = $enterpriseAcc->getId($_SESSION["loggedInEN"]);
    $skills = $_POST["j_skills"];
    $details = $_POST["j_details"];
    $confirmation = $newPost->post_new_add($title,$postion,$location,$enterprise,$skills,$details);
    if($confirmation){
        header("Location:profile.php");
    }else{
        $error = true;
        $errorMsg = "<div class='alert alert-danger' role='alert'>something went wrong try again</div>";
    }
}
?>