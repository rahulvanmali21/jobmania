<?php include("../includes/partials/enterprice_header.php");
?>
<?php include("../includes/partials/enterprice_navbar.php");?>
<div class="container mt-2">
<h2 class="font-weight-light"> Recent posts </h2>
<hr>
<?php
$result = mysqli_query($con,"SELECT * FROM posts WHERE enterprise='$id' ORDER by postedOn ");

while($row = mysqli_fetch_array($result)){
echo "<div class='card mt-4 animated fadeInUp delay-1s'>
<div class='card-body'>
  <h5 class='card-title'>".$row['title']."  (<span class='text-primary'>Applied ". Post::ApplicantCount($con,$row["id"],$row["enterprise"]) ."</span>)</h5>
  <span class='card-text text-warning'><small class='text-secondary'> Location</small> ".$row["location"]."</span><br>
  <p class='card-text'><span class='text-muted'>Job type :</span>".$row["postion"]."</p>
  <p class='card-text'><span class='text-muted'>Skills required :</span>".$row["skills"]."</p>
  
  <small class='float-right text-muted'>Posted on<br>". date("D d F y",strtotime($row["postedOn"]))."</small>
  
  <a href='applicants.php?pid=".$row["id"]."' class='btn btn-primary btn-sm'>View Applicants</a>

</div>
</div>
";
}
if(mysqli_num_rows($result) ==0){ ?>
 <h4>you haven't post any new Ads.</h4>
 <a href="new_post.php" class="btn btn-primary">Post Job</a>
 <?php } ?>

</div>
<?php include("../includes/partials/enterprice_footer.php");?>