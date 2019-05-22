<?php include("./includes/layout/applicant_header.php"); ?>
<?php include("./includes/partials/main_navbar.php"); ?>
<?php include("./includes/modals/applicant_login.php"); ?>

<div class="container">
<div class="row">
<div class="col-sm-12 col-md-12">
<?php 
if(isset($_GET["p"]) && isset($_GET["l"]) && $_GET["p"]!="" && $_GET["l"]!=""){
$postion = $_GET["p"];
$location = $_GET["l"];
$query = mysqli_query($con,"SELECT * FROM posts WHERE postion LIKE '%$postion%' AND location LIKE '$location' ORDER BY postedOn DESC");
while($row = mysqli_fetch_array($query)){
    echo "
   <div class='card mt-2 text-wrap animated fadeInUp'>
    <div class='card-body'>
        <h5 class='card-title'>".$row['title']."</h5>
        <span class='card-text text-warning'><small class='text-secondary'> Location</small> ".$row['location']."</span><br>
        <small class='text-muted'>Posted By: <strong class='text-primary'>" .$enterpriceAccount->getName($row["enterprise"])." </strong></small> 
        <p><small class='text-wrap text-break text-truncate'>
            ".$row['skills']."
        </small></p>
        <a href='post.php?id=".$row['id']."' class='btn btn-outline-primary'>View <i class='fas fa-info'></i></a>
        <small class='text-muted float-right'>". date("D d M y",strtotime($row['postedOn']))."</small>
    </div>
    </div>";
}
} else{
    echo "<h1>please enter a location and designation</h1>";
}
if(mysqli_num_rows($query) == 0){
 echo '<h1 class="mt-3 animated bounce delay-2s"> No "'.$postion.'" jobs found in "'.$location.'"  </h1>';
 }?>
</div>

</div>
</div>
<style>
body{
    background:	#dcdcdc;
}
</style>
<?php include("./includes/layout/applicant_footer.php"); ?>

