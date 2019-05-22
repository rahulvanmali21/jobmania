<?php if(isset( $_SESSION["loggedInEN"])){
  $user =  $_SESSION["loggedInEN"];
  } else{
    header("Location:register.php");
  }
$id = $enterpriseAcc->getId($user)

  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 animated fadeInDown" style="border-bottom:2px solid orange;">
    <div class="container">
  <a class="navbar-brand text-primary text-monospace" href="dashboard.php">Job Mania</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#enterpriseNav" aria-controls="enterpriseNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="enterpriseNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" href="new_post.php"><i class="far fa-newspaper"></i> New Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php"><i class="fas fa-user-alt"></i> <?php echo $_SESSION["loggedInEN"] ?> </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" style="cursor:pointer" onclick="logout()"><i class="fas fa-sign-out-alt"></i> logout</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
<script>
let logout = ()=>{
    $.post("../includes/handlers/enterprice_ajax_logout.php")
        .done(window.location.href="http://localhost/jobmania")
}
</script>