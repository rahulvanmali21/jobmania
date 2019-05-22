<?php include("./includes/layout/applicant_header.php"); ?>
<?php include("./includes/partials/main_navbar.php"); ?>
<?php include("./includes/modals/applicant_login.php");
include("./includes/classes/Post.php");
if(isset($_GET["id"]) && $_GET["id"]!=""){
    $post = new Post($con,$_GET["id"]);
}else{
    header("location:search.php");
}
?>
<div class="container bg-light">
<div class="h2 my-4 text-dark"><u><?php echo $post->getTitle();?></u></div>
<h4 class="text-muted">Posted by: <strong class="text-primary"><?php echo $post->getEnterprise(); ?></strong></h4>
<div class="h5 text-muted">location <span class="text-warning"><?php echo $post->getLocation() ?></span></div>
<hr>
<div class=" mt-sm-2">
<h6 class="mt-4">Skill require</h6>
<small><?php echo $post->getSkills()?></small>
<h6 class='mt-3'>Job Description</h6>
<small><?php echo $post->getDetails()?></small>
<p class="lead mt-3"><small class="muted">posted on: <?php echo date("D d F y",strtotime($post->getPostedOn())); ?></small><p>
<?php if(isset($_SESSION["loggedInAP"])){
    if(isApplied($applicant->getId($_SESSION["loggedInAP"]),$con)){
        echo '<p><button class="btn btn-primary mt-2 text-uppercase" disabled >Applied</button></p>';
    }else{
        echo '
        <p><button class="btn btn-outline-primary btn-lg mt-2 text-uppercase animated infinite pulse" onclick="apply()">Apply now</button></p>

        ';
    }
    
}else{
    echo '<p><span style="cursor:pointer" class="text-primary" data-toggle="modal" data-target="#app_loginModal">Login </span> or <a href="register.php" class="text-danger"> Register to Apply</a></p>';
}
function isApplied($applicant_id,$con){
    $post = $_GET["id"];
    $check = mysqli_query($con,"SELECT id FROM jobApplications WHERE applicant='$applicant_id' and post='$post'");
    if(mysqli_num_rows($check) == 1){
        return true;
    }
    return false;
}
?>
</div>
</div>
<script>
let data = {
    post: <?php echo $_GET["id"]; ?>,
    enterprice:<?php echo $post->getEnterpriseId(); ?>,
    applicant : <?php echo(isset($_SESSION["loggedInAP"])) ? $applicant->getId($_SESSION["loggedInAP"]):"null"; ?>}
data = JSON.stringify(data);
let apply =()=>{
    console.log("presses")
$.post("./includes/handlers/applicant_ajax_apply.php",{data:data})
    .done(msg=>{
        if(msg == "success"){
            location.reload()
        }
    })
}
</script>
<?php include("./includes/layout/applicant_footer.php"); ?>