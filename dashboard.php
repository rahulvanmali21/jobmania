<?php 
include("./includes/layout/applicant_header.php");
include("./includes/partials/main_navbar.php");
include("./includes/modals/applicant_login.php"); 
include("./includes/classes/Post.php");
include("./includes/classes/ApplicantInfo.php");
?>
<?php 
 if(!isset($_SESSION["loggedInAP"])){
    header("Location:index.php");
}
   $applicant_id = $applicant->getId($_SESSION["loggedInAP"]);
?>
<div class="container">
<?php 
$result = mysqli_query($con,"SELECT * FROM jobApplications WHERE applicant='$applicant_id'");
while($row = mysqli_fetch_array($result)){
    $appliedPost = new Post($con,$row["post"]);
    echo  '
    <div class="card mb-2 animated fadeInUp">
  <div class="card-body">
    <h5 class="card-title">'. $appliedPost->getTitle() .'</h5>
    <h6 class="card-subtitle mb-2 text-warning"> <small class="text-muted">location </small>'.$appliedPost->getLocation().'</h6>
    <hr>
    <h6><small class="text-muted">posted by </small><span class="text-primary">'.$appliedPost->getEnterprise().'<span></h6>
    <p><span class="text-muted">Status: </span><strong class="text-uppercase">'. ApplicantInfo::getStatus($con,$row["post"],$applicant_id).'</strong></p>
    <p class="card-text"><span class="text-muted">skills </span> '.$appliedPost->getSkills().'</p>
    <small class="card-text text-muted float-right">'. date("D d M y",strtotime($appliedPost->getPostedOn())).'</small>

    <a href="post.php?id='.$row["post"].'" class="card-link">view</a>
  </div>
</div>
    ';
}
?>

</div>
<style>
body{
    background:	#dcdcdc;
}
</style>
<?php include("./includes/layout/applicant_footer.php"); ?>