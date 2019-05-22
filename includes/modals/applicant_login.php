<div class="modal fade text-secondary " id="app_loginModal" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-warning" id="tille">Login to get started</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="app_email">Email</label>
            <input type="email" class="form-control" id="app_email" placeholder="git@hub.com">
        </div>
        <div class="form-group">
            <label for="e_pass">Password</label>
            <input type="password" class="form-control" id="app_pass" placeholder="********">
        <small class="text-danger text-center" id="errmsg"></small>
        </div>
        <small>Dont have an Account <a href="register.php">Register Here </a></small><br>
        <button type="button" class="btn btn-primary btn-block" id="loginBtn"><i class="fas fa-sign-in-alt"></i> Login</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(()=>{
 $("#loginBtn").on("click",()=>{
   var email = $("#app_email").val();
   var pass = $("#app_pass").val();
   $.post("./includes/handlers/applicant_ajax_login.php",{email:email,pass:pass})
      .done((err)=>{
          if(err != ""){
            $("#errmsg").html(err)
            return;
          }
          location.reload();;
      });
 });
});
</script>