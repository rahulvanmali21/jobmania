<?php
include("../../config/config.php");

if(isset($_POST["data"]) && $_POST["data"]!="" && isset($_SESSION["loggedInEN"])){
    $data = $_POST["data"];
    $post_id = $data["post_id"];
    $enterprice_id = $data["enterprice_id"];
    $applicant_id = $data["applicant_id"];

    $rejectQuery =  mysqli_query($con,"UPDATE jobApplications SET status='rejected' WHERE post='$post_id' AND enterprice='$enterprice_id' AND applicant='$applicant_id' ");
    if($rejectQuery){
        echo "success";
    }else{
        echo "failed";
    }
}
else{
    echo "not working";
}
?>  