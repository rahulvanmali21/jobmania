<?php
if($isMsg){
    echo $msg;
}?>
<form action="resume.php" method="POST">
        <div class="h4 mt-2 text-primary">Create Resume <i class="far fa-id-card"></i></div>
        <h6>Personal Information <i class="fas fa-phone-square"></i></h6>
        <hr>
        <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Jon">
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" class="form-control" name="l_name" id="lname" placeholder="snow">
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <label for="dob">Date of Birth</label>
            <input type="date" class="form-control" name="dob" id="dob" format="Y-m-d">
        </div>
        <div class="col-md-3 col-sm-12">
        <label for="contact">Phone no.  </label>
        <input type="tel" class="form-control" name="contact_no" id="contact" placeholder="999-999-9999">
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Winterfell,North ,Westeros">
            </div>
        </div>
        </div>
        <h6 class="mt-3">Education Details <i class="fas fa-university"></i></h6>
        <hr>
        <div class="row">
        <div class="col-md-4 col-sm-12">
            <label for="optEd">Graduation status</label>
            <select class="custom-select" id="optEd" name="edu_status">
            <option selected disabled></option>
            <option value="1">under-graduate</option>       
            <option value="2">Graduated</option>
            <option value="3">Post-Graduated</option>
            <option value="4">PhD</option>
            </select>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
            <label for="un-clg">University/College name</label>
                <input type="text" name="university" id="un-clg" class="form-control" placeholder="M.I.T">
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
            <label for="degree">Degree</label>
                <input type="text" name="degree" id="degree" class="form-control" placeholder="M.Sc Computer Science">
            </div>
        </div>
        </div>
        <div class="h6">Key Skills <i class="fas fa-brain"></i></div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-sm-12">
            <textarea name="skills" class="form-control mb-3" id="skills"  rows="3" placeholder="Python, numpy, Tensorflow"></textarea>
            </div>
        </div>
        <div class="row">
        <div class="col-12 col-md-4 offset-md-4 mb-2 mb-sm-3">
        <button type="submit" name="resumeBtn" class="btn btn-primary btn-block">Save <i class="far fa-save fa-lg"></i></button>
        </div>
        </div>
    </form>