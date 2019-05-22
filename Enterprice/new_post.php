<?php include("../includes/partials/enterprice_header.php");
if(isset( $_SESSION["loggedInEN"])){
    $user =  $_SESSION["loggedInEN"];
    } else{
      header("Location:register.php");
    }
?>
<div class="row sm-py-1">
<div class="col-md-6 offset-md-3 col-sm-6 offset-sm-2 mt-4 border p-3 bg-light rounded animated fadeInUp">
<div class=" container">
<h2 class="text-warning mt-3">Post a New JOB</h2>
<hr class="bg-primary mb-5">
    <form action="new_post.php" method="POST">
        <?php if($error)
            echo $errorMsg;
        ?>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light border-right-0" id="j_title"><i class="fas fa-ad"></i></span>
            </div>
            <input type="text" name="j_title" class="form-control border-left-0" placeholder="Ad/Post Title" aria-label="job title" aria-describedby="j_title" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light border-right-0" id="j_postion"><i class="fas fa-briefcase"></i></span>
            </div>
            <input type="text" name="j_postion" class="form-control border-left-0" placeholder="designation" aria-label="job postion" aria-describedby="j_postion" required> 
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text bg-light border-right-0" id="j_location"><i class="fas fa-map-marker-alt"></i></span>
            </div>
            <input type="text" name="j_location" class="form-control border-left-0" placeholder="location" aria-label="job location" aria-describedby="j_location" required>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-light border-right-0"><i class="fas fa-university"></i></i></span>
        </div>
        <textarea class="form-control border-left-0" name="j_skills" aria-label="Skills" placeholder="Skills required" rows="3" required></textarea>
        </div>

        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-light border-right-0"><i class="fas fa-info-circle"></i></span>
        </div>
        <textarea class="form-control border-left-0" name="j_details" aria-label="Job Describtion" placeholder="Job Describtion" rows="4" required></textarea>
        </div>
    
    <button type="submit" class="btn btn-primary btn-block mb-3" name="postJobBtn">POST</button>
    </form>
</div>
</div>
</div>
<script>
let title = "Enterprice | Post Job";
document.title = title;
</script>
<style>
body{
    background:	#dcdcdc;
}</style>
<?php include("../includes/partials/enterprice_footer.php");?>
