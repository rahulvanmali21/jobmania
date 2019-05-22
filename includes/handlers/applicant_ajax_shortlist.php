<?php
require("../classes/EnterpriceAccount.php");
require("../classes/ApplicantInfo.php");
include("../../config/config.php");
include ("../PHPMailer/PHPMailerAutoload.php");
if(isset($_POST["data"]) && !empty($_POST["data"])){
    $post_id = $_POST["data"]["post_id"];
    $applicant_id = $_POST["data"]["applicant_id"];
    $enterprice_id = $_POST["data"]["enterprice_id"];
    $enterprice_name = $_SESSION["loggedInEN"];
 
        $result = mysqli_query($con,"UPDATE jobApplications SET status='selected' WHERE enterprice='$enterprice_id' AND applicant='$applicant_id' AND post='$post_id'");
        if($result){
            $address = ApplicantInfo::getApplicantEmail($con,$applicant_id);
            $msg = $_POST["emailBody"];
            $from = EnterpriseAccount::getEmail($con,$enterprice_id);
            if(sendMail($msg,$address,$from,$enterprice_name,$gmail_emailID,$gmaill_password)){
                echo "success";
            }else{
                echo "failed";
            }
        }
        else {
            echo "failed";
        }
    

}else{
    echo " not working";
}
function sendMail($msg,$address,$from,$enterprice,$gmail_emailID,$gmaill_password){
    $mail = new PHPMailer();
    $mail->isSMTP();                                       
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;                               
    $mail->Username = $gmail_emailID;                 
    $mail->Password = $gmaill_password;                        
    $mail->SMTPSecure = 'tls';                         
    $mail->Port = 587;                                 

    $mail->setFrom('no-reply@'.$from);
    $mail->addAddress($address);                
    $mail->isHTML(true);                                 

    $mail->Subject = 'short listed by '.$enterprice . '';
    $mail->Body  = $msg; 

    if(!$mail->send()) {
        return false;
    } else {
        return true;
    }
}

?>
