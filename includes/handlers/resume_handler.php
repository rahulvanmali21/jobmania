<?php 
$isMsg = false;
$msg= "";
if(isset($_POST["resumeBtn"])){
    $first_name = $_POST["f_name"];
    $last_name = $_POST["l_name"];
    $date_of_birth =dateFormate($_POST["dob"]);
    $contact_no = $_POST["contact_no"];
    $addr = $_POST["address"];
    $education_status = getOptionValue($_POST["edu_status"]);
    $university = $_POST["university"];
    $degree = $_POST["degree"];
    $kills = $_POST["skills"];


    $applicant_id = $applicant->getId($_SESSION["loggedInAP"]);
    if($resume->isCreated($applicant_id)){
        $result = $resume->update($applicant_id,$first_name,$last_name,$date_of_birth,$contact_no,$addr,$education_status,$university,$degree,$kills);
        $isMsg = true;
        if($result){
            $msg = alert("success","updated successfully");
        }else{
            $msg =  alert("danger","update Failed");
        }
    }
    else{
        $result = $resume->create($applicant_id,$first_name,$last_name,$date_of_birth,$contact_no,$addr,$education_status,$university,$degree,$kills);
        $isMsg = true;
        if($result){
            $msg = alert("success","updated successfully");
        }else{
            $msg =  alert("danger","update Failed");
        }
    }
}
function dateFormate($dateString){
    $time = strtotime($dateString);
    return  date("Y-m-d",$time);
}
function getOptionValue($x){
    if($x == 1){
        return "under-graduate";
    }
    elseif($x == 2){
        return "graduated";
    }
    elseif($x == 3){
        return "post-graduated";
    }
    elseif($x == 4){
        return "Ph.D";
    }
    else{
        return "graduated";
    }
}
function alert($class,$alertMsg){
    return "<div class='alert alert-".$class." mt-2' role='alert'>Resume ".$alertMsg."</div>
    <script>
    setTimeout(() => {
        $('.alert').alert('close')
    }, 1000); 
    </script>";
}

?>