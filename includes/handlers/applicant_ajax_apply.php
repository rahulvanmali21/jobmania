<?php 
include("../../config/config.php");

if(isset($_POST["data"]) && $_POST["data"]!= NULL && isset($_SESSION["loggedInAP"])){
    $data = json_decode($_POST["data"],true);
    $post = (int)$data["post"];
    $applicant = (int)$data["applicant"];
    $enterprice = (int)$data["enterprice"];
    $appliedOn = date("Y-m-d");
    $result = mysqli_query($con,"INSERT INTO jobApplications VALUES('','$post','$applicant','$enterprice','applied','$appliedOn')");
    if($result){
        echo "success";
    }else{
        echo "failed";
    }
}else{
    echo"not working";
}
?>