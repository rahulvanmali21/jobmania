<?php include("../config/config.php");
      include("../includes/classes/Constants.php");
      include("../includes/classes/EnterpriceAccount.php");
      $enterpriseAcc = new EnterpriseAccount($con);
      include("../includes/handlers/register_handler.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>job MANIA | Register</title>
    <link rel="stylesheet" href="../assets/stylesheet/bootstrap.css">
    <link rel="stylesheet" href="../assets/stylesheet/landing_page.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body style=" overflow-x: hidden;">
<script>
    $(document).ready(()=>{ 
<?php 
if(isset($_POST["registerENT"])){
    echo '
    
    $("#registerForm").removeClass("animated fadeInDown");
    ';
}
?>
})
</script>
<?php include("../includes/modals/enterprice_login.php");?>
<div class="row">
<div class="col-md-4 offset-md-4 col-sm-6 offset-sm-2 mt-5 ">
<div class=" container p-3 text-secondary bg-light rounded animated fadeInDown" id="registerForm">
<h3 class="text-center text-warning">Register for Free</h3>
    <form action="register.php" method="POST">
    <div class="form-group">
        <label for="first_name">Enterprise Name</label>
        <input type="text" class="form-control" name="e_name" id="first_name" placeholder="Eg. Stark">
        <?php echo $enterpriseAcc->getAllError(Constants::$UserNameExist); ?>

    </div>

    <div class="form-group">
        <label for="email">Company's Email address</label>
        <input type="email" class="form-control" id="email" name="e_email"  placeholder="Eg.stark @gmail.com">
        <?php echo $enterpriseAcc->getAllError(Constants::$em_invalid); ?>
        <?php echo $enterpriseAcc->getAllError(Constants::$emailNameExist); ?>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="e_password" id="password" placeholder="*******">
        <?php echo $enterpriseAcc->getAllError(Constants::$pass_type) ?>
        <?php echo $enterpriseAcc->getAllError(Constants::$pass_len); ?>
    </div>
    <div class="form-group">
        <label for="password_confirm">Confirm Password</label>
        <input type="password" class="form-control" name="e_password_confirm" id="password_confirm" placeholder="*******">
        <?php echo $enterpriseAcc->getAllError(Constants::$pass_match); ?>
    </div> 
    <small style="cursor:pointer" class="text-danger" data-toggle="modal" data-target="#e_loginModal">already have an account? click here!</small>
    <button type="submit" class="btn btn-primary btn-block mt-2 mb-3" name="registerENT">Submit</button>
    </form>
</div>
</div>
</div>
<style>
body{
   background:	#dcdcdc;
}
</style>
</body>
</html>