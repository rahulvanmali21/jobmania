<?php 
class ApplicantResume{
    private $con;
    private $applicant_id;
    private $first_name;
    private $last_name;
    private $date_of_birth;
    private $contact_no;
    private $address;
    private $education;
    private $university;
    private $degree;
    private $skills;

    public function __construct($con,$applicant_id){
        $this->con = $con;
        $this->applicant_id = $applicant_id;
        $result = mysqli_query($this->con,"SELECT * FROM resumes WHERE applicant='$this->applicant_id'");
        $row = mysqli_fetch_array($result);
        $this->id = $row["id"];
        $this->first_name = $row["first_name"];
        $this->last_name = $row["last_name"];
        $this->date_of_birth = $row["date_of_birth"];
        $this->contact_no = $row["contact_no"];
        $this->address = $row["addrs"];
        $this->education = $row["education_status"];
        $this->university = $row["university"];
        $this->degree = $row["degree"];
        $this->skills = $row["skills"];
        echo "<script>console.log('$this->applicant_id')</script>";
    }
    public function getResumeId(){
        return $this->id;
    }
    public function getFirst_name(){
        return $this->first_name;
    }
    public function getLast_name(){
        return $this->last_name;
    }
    public function getDate_of_birth(){
        return $this->date_of_birth;
    }
    public function getContact_no(){
        return $this->contact_no;
    }
    public function getAddress(){
        return $this->address;
    }
    public function getEducation_status(){
        return $this->education;
    }
    public function getUniversity(){
        return $this->university;
    }    
    public function getDegree(){
        return $this->degree;
    }
    public function getSkills(){
        return $this->skills;
    }
}
?>