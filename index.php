<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job MANIA</title>
    <link rel="stylesheet" href="assets/stylesheet/bootstrap.css">
    <link rel="stylesheet" href="assets/stylesheet/landing_page.css">
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
<?php include("./includes/modals/applicant_login.php");
session_start();
if(isset($_SESSION["loggedInAP"])){
    header("Location:dashboard.php");
}

?>
   <div class="main">
    <div class="container pt-4">
    <div class="heading text-center pt-5 mb-5 animated zoomIn">
        <h1 class="text-primary ">Welcome To Job Mania</h1>
        <h3 class="text-light" >hire people or get hired</h3>
    </div>

    <form action="search.php" class="animated fadeInUp delay-1s">
    <div class="row mt-3">
        <div class="col-sm-12 col-md-4">
        <input type="text" name="p" class="form-control rounded-pill mb-3" placeholder="Postion" required>
        </div>
        <div class="col-sm-12 col-md-4">
        <input type="text" name="l" class="form-control rounded-pill mb-3" placeholder="Location" required>
        </div>
        <div class="col-sm-12 col-md-4">
        <button type="submit" class="btn btn-primary rounded-pill btn-block"><i class="fas fa-search-location"></i> Search Jobs</button>
        </div>
    </div>
    </form>

    </div> 
    <h6 class="text-center mt-5 animated fadeIn delay-1s"><a href ="Enterprice/register.php" class="text-warning mr-5">For Enterprise</a>
    <a style="cursor:pointer" data-toggle='modal' data-target='#app_loginModal' class="text-warning">For Freshers</a></h6>
    </div>
 
</body>
</html>