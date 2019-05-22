<?php include("./includes/layout/applicant_header.php"); 
 include("./includes/partials/main_navbar.php"); 
 include("./includes/modals/applicant_login.php");
 include("./includes/handlers/resume_handler.php");
 if(!isset($_SESSION["loggedInAP"])){
     header("Location:index.php");
 }
    $applicant_id = $applicant->getId($_SESSION["loggedInAP"]);
 ?>
<div class="container text-dark animated fadeIn">
 <?php 
    if($resume->isCreated($applicant_id)){
        include("./includes/partials/resumeFormEdit.php");        
    }else{
        include("./includes/partials/resumeFormCreate.php");
    }
 ?>
 
    
</div>
<?php include("./includes/layout/applicant_footer.php"); ?>