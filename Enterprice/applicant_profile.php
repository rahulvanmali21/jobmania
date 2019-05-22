<?php include("../includes/partials/enterprice_header.php");
 include("../includes/partials/enterprice_navbar.php");
include("../includes/classes/ApplicantResume.php");
include("../includes/classes/ApplicantInfo.php");
include("../includes/modals/email_field.php");

?>
<div class="container  bg-light p-4 animated fadeInUp">
<?php
$valid = ( isset( $_GET['aid'] ) && is_numeric( $_GET['aid'] ) ) ? intval( $_GET['aid'] ) : 0;
if ( $valid == 0 ){
    header('location:profile.php');
}
$applicant_id = $_GET["aid"];
$ap_resume = new ApplicantResume($con,$applicant_id);  
$post_id = $_GET["pid"];  
?>

<h3>Resume</h3>
<hr>
<h4 class="text-muted"><?php echo $ap_resume->getFirst_name() ." ". $ap_resume->getLast_name(); ?> </h4>
<p class="text-dark">
    <div class="row">
        <div class="col-6 col-md-4 text-muted">
        <u>Age</u><br>
        <u>Date of Birth</u>  <br>
        <u>Address</u> <br>
        <u>Email</u> <br>
        <u>Phone No</u> <br>
        <u>Education</u> <br>
        <u>University/college</u> <br>
        <u>Degree</u> <br>
        <u>Key Skills</u> <br>
        </div>
        <div class="col-6 col-md-8">
            : <?php echo ApplicantInfo::getApplicantAge($con,$applicant_id) ?> <br>
            : <?php echo $ap_resume->getDate_of_birth()." ";?>  <br>
            : <?php echo $ap_resume->getAddress() ?> <br>
            : <?php echo ApplicantInfo::getApplicantEmail($con,$applicant_id) ?> <br>
            : <?php echo $ap_resume->getContact_no() ?> <br>
            : <?php echo $ap_resume->getEducation_status() ?> <br>
            : <?php echo $ap_resume->getUniversity() ?> <br>
            : <?php echo $ap_resume->getDegree()?><br>
            : <?php echo $ap_resume->getSkills() ?> <br>
        </div>

    </div>
</p>
<hr>
<?php 
 $statusResult = mysqli_query($con,"SELECT status FROM jobApplications WHERE applicant='$applicant_id' AND enterprice='$id' AND post='$post_id'");
 $row = mysqli_fetch_array($statusResult);
 if($row["status"] == "rejected"){
     echo '
     <button class="btn btn-info" disabled>Rejected</button>     
     ';
 }
 elseif($row["status"]=="selected"){
    echo'
    <button class="btn btn-primary" disabled>short listed</button>         
    ';
 }
 else{
     echo '
        <button class="btn btn-primary" data-toggle="modal" data-target="#email_modal">Short List</button> OR
        <button class="btn btn-secondary" onclick="reject()">Reject</button>
     ';
 }
?>

</div>
<style>
body{
    background:	#dcdcdc;
}</style>
<script>
let data = {
    post_id:<?php echo $post_id ?>,
    applicant_id:<?php echo $applicant_id ?>,
    enterprice_id:<?php echo $id ?>
};
let reject =()=>{
    $.post("../includes/handlers/reject_ajax.php",{data:data})
        .done(msg=>{
            if (msg =="success") {
                location.reload();
            }
            
        });
}
let shortlist=()=>{
    let emailBody = $("#message-text").val()
    $.post("../includes/handlers/applicant_ajax_shortlist.php",{data:data,emailBody:emailBody})
        .done(msg=>{
            if(msg == "success") {
                location.reload()
            }
        })
}
</script>
<?php include("../includes/partials/enterprice_footer.php");?>