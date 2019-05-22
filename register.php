<?php include("./includes/layout/applicant_header.php");
 include("./includes/modals/applicant_login.php"); 
include("./includes/handlers/applicant_register_handler.php");
?>
<script>
    $(document).ready(()=>{ 
<?php 
if(isset($_POST["registerAP"])){
    echo '
    
    $("#registerForm").removeClass("animated fadeInDown");
    ';
}
?>
})
</script>
<div class="row">
<div class="container">
<div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 mt-5 p-5 rounded bg-light animated fadeInDown" id="registerForm">
<h3 class="text-center text-warning">Create An Account (it's Free)</h3>
    <form action="register.php" method="POST">
    <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" class="form-control" name="a_name" id="fullname" placeholder="Eg. Jon snow">
        <?php echo $applicant->getAllError(Constants::$fn_invalid); ?>
    </div>

    <div class="form-group">
        <label for="email"> Email address</label>
        <input type="email" class="form-control" id="email" name="a_email"  placeholder="Eg. johnsnow@gmail.com">
        <?php echo $applicant->getAllError(Constants::$emailNameExist); ?>
        <?php echo $applicant->getAllError(Constants::$em_invalid); ?>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="a_password" id="password" placeholder="*******">
        <?php echo $applicant->getAllError(Constants::$pass_type) ?>
        <?php echo $applicant->getAllError(Constants::$pass_len); ?>
    </div>
    <div class="form-group">
        <label for="password_confirm">Confirm Password</label>
        <input type="password" class="form-control" name="a_password_confirm" id="password_confirm" placeholder="*******">
        <?php echo $applicant->getAllError(Constants::$pass_match); ?>
    </div> 
    <small style="cursor:pointer" class="text-danger" data-toggle="modal" data-target="#app_loginModal">already have an account? click here!</small>
    <button type="submit" class="btn btn-primary btn-block mt-2 mb-3" name="registerAP">Create Account</button>
    </form>
</div>
</div>
</div>
<script>
let title = "Applicant | Registeraion";
document.title = title;
</script>
<?php include("./includes/layout/applicant_footer.php"); ?>