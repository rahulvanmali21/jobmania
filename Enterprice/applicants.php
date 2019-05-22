<?php include("../includes/partials/enterprice_header.php");
?>
<?php include("../includes/partials/enterprice_navbar.php");?>
<?php include("../includes/classes/ApplicantInfo.php");?>

<div class="container mt-4">
<div class="row">
<div class="col-12 col-md-8 animated fadeIn delay-1s">
<?php 
if(isset( $_GET["pid"] ) && !empty( $_GET['pid'] )){
    $enterprice_id = $enterpriseAcc->getId($_SESSION["loggedInEN"]);
    $post_id = $_GET["pid"];
    $result = mysqli_query($con,"SELECT * FROM jobApplications WHERE enterprice='$enterprice_id' AND post='$post_id'");
    while($row=mysqli_fetch_array($result)){
        echo '
        <div class="card mb-3">
        <div class="card-body">
          <div class="row">
              <div class="col-4 col-md-2">
                  <i class="fas fa-user-tie fa-5x float-left text-secondary"></i>
              </div>
              <div class="col-8 col-md-9">
              <h6>'.ApplicantInfo::getApplicantFullName($con,$row["applicant"]).'</h6>
              <small class="">'.ApplicantInfo::getApplicantEmail($con,$row["applicant"]).'</small><br>
              <small><a href="applicant_profile.php?aid='.$row["applicant"].'&pid='.$post_id.'" class=" float-right btn btn-primary ">view</a></small>
              </div>
          </div>
        </div>
      </div>        
        ';
    }
}else{
    header("Location:profile.php");
}

?>



</div><!-- column -->
</div><!-- row -->
</div> <!-- container -->
<style>
body{
    background:	#dcdcdc;
}</style>
<?php include("../includes/partials/enterprice_footer.php");?>
