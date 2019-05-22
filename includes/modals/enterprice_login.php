<div class="modal fade text-secondary " id="e_loginModal" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
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
            <label for="e_name">Enterprice Name</label>
            <input type="text" class="form-control" id="e_name" placeholder="eg. Tesla">
        </div>
        <div class="form-group">
            <label for="e_pass">Password</label>
            <input type="password" class="form-control" id="e_pass" placeholder="Password">
        </div>
        <button type="button" class="btn btn-primary btn-block" id="loginBtn"><i class="fas fa-sign-in-alt"></i> Login</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(()=>{
 $("#loginBtn").on("click",()=>{
   var name = $("#e_name").val();
   var pass = $("#e_pass").val();
   $.post("../includes/handlers/enterprice_ajax_login.php",{name:name,pass:pass})
      .done((err)=>{
          if(err != ""){
            alert(err);
            return;
          }
          window.location ="profile.php";
      });
 });
});
</script>