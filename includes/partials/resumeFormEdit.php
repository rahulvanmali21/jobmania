<?php 
if($isMsg){
    echo $msg;
}
$applicant_id = $applicant->getId($_SESSION["loggedInAP"]);
$applicantResume = new ApplicantResume($con,$applicant_id);
?>
<form action="resume.php" method="POST" class="needs-validation" novalidate>
        <div class="h4 mt-2 text-primary">Edit Your Resume <i class="far fa-id-card"></i></div>
        <h6>Personal Information <i class="fas fa-phone-square"></i></h6>
        <hr>
        <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Jon" required value="<?php echo $applicantResume->getFirst_name(); ?>">
            <div class="invalid-feedback">Please enter your First Name.</div>
        </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" class="form-control" name="l_name" id="lname" placeholder="snow" required value="<?php echo $applicantResume->getLast_name(); ?>">
        <div class="invalid-feedback">Please enter your Last Name.</div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" name="dob" id="dob" required format="Y-m-d" value="<?php echo $applicantResume->getDate_of_birth(); ?>">
        <div class="invalid-feedback">Please enter your Date of Birth</div>
        </div>
        <div class="col-md-3 col-sm-12">
        <label for="contact">Phone no.  </label>
        <input type="tel" class="form-control" name="contact_no" id="contact" required placeholder="999-999-9999" value="<?php echo $applicantResume->getContact_no(); ?>">
        <div class="invalid-feedback">Please enter contact no. in 000-000-0000 format</div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address"  required placeholder="Winterfell,North ,Westeros" value="<?php echo $applicantResume->getAddress(); ?>">
        <div class="invalid-feedback">Please enter your address</div>  
            </div>
        </div>
        </div>
        <h6 class="mt-3">Education Details <i class="fas fa-university"></i></h6>
        <hr>
        <div class="row">
        <div class="col-md-4 col-sm-12">
            <label for="optEd">Graduation status</label>
            <select class="custom-select" id="optEd" name="edu_status" required>
            <option value="1" <?php if($applicantResume->getEducation_status() == "under-graduate" ) {echo "selected";} ?> >under-graduate</option>       
            <option value="2" <?php if($applicantResume->getEducation_status() == "graduated" ) {echo "selected";} ?> >Graduated</option>
            <option value="3" <?php if($applicantResume->getEducation_status() == "post-graduated" ) {echo "selected";} ?> >Post-Graduated</option>
            <option value="4" <?php if($applicantResume->getEducation_status() == "Ph.D" ) {echo "selected";} ?> >PhD</option>
            </select>
        <div class="invalid-feedback">Please select your education status</div>  
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
            <label for="un-clg">University/College name</label>
                <input type="text" name="university" id="un-clg" required class="form-control" placeholder="M.I.T" value="<?php echo $applicantResume->getUniversity(); ?>">
                <div class="invalid-feedback">Please enter your Universiy/college name</div>  
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
            <label for="degree">Degree</label>
                <input type="text" name="degree" id="degree" class="form-control" required placeholder="M.Sc Computer Science" value="<?php echo $applicantResume->getDegree(); ?>">
                <div class="invalid-feedback">Please enter your Degree</div>  
            </div>
        </div>
        </div>
        <div class="h6">Key Skills <i class="fas fa-brain"></i></div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-12">
            <textarea name="skills" class="form-control mb-3" required id="skills"  rows="3" placeholder="Python, numpy, Tensorflow"><?php echo trim($applicantResume->getSkills()); ?></textarea>
            <div class="invalid-feedback">Please enter your key Skill</div>              
            </div>
        </div>
        <div class="row">
        <div class="col-12 col-md-4 offset-md-4 mb-2 mb-sm-3">
        <button type="submit" name="resumeBtn" class="btn btn-primary btn-block">Save <i class="far fa-save fa-lg"></i></button>
        </div>
        </div>
    </form>
    <script>
      
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          var forms = document.getElementsByClassName('needs-validation');
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>