<nav class="navbar navbar-expand-lg navbar-light bg-light py-4 animated fadeInDown" style="border-bottom: 3px solid orange;">
  <a class="navbar-brand text-primary"><strong>JOB MANIA </strong> <i class="fas fa-scroll"></i></a>
  <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <i class="fas fa-angle-down"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      <?php if(isset($_SESSION["loggedInAP"])) { ?>
        <li class='nav-item'>
              <a class='nav-link' href='dashboard.php'> <?php echo $_SESSION["loggedInAP"] ?></a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='resume.php'>Resume</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' style='cursor:pointer' onclick='logout()'>Logout</a>
            </li>
      <?php } else{ ?> 
        <li class='nav-item'>
        <a class='nav-link' style='cursor:pointer' data-toggle='modal' data-target='#app_loginModal'><i class='fas fa-sign-in-alt fa-lg'></i> Login</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='register.php'><i class='fas fa-user-plus '></i> Register</a>
      </li>
      <?php } ?>
     
    </ul>
    <form class='form-inline my-2 my-lg-0' action='search.php'  method='GET'>
      <input class='form-control mr-sm-2 mb-2 rounded-pill ' type='search' placeholder='Postion' aria-label='Search' name='p'>
      <input class='form-control mr-sm-2 mb-2 rounded-pill' type='search' placeholder='Location' aria-label='Location' name='l'>
      <button class='btn btn-primary my-2 my-sm-0 rounded-pill' type='submit'><i class='fas fa-search'></i> Search</button>
    </form>
  </div>
</nav>
<script>
let logout =()=>{
  $.post("./includes/handlers/applicant_ajax_logout.php")
    .done(()=>{
      location.reload();
    })
}
</script>
