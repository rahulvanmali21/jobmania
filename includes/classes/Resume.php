<?php 
class Resume{
    private $con;
    private $applicant_id;


    public function __construct($con){
        $this->con=$con;
    }

    public function isCreated($applicant_id){
        $result = mysqli_query($this->con,"SELECT * FROM resumes WHERE applicant='$applicant_id'");
        if(mysqli_num_rows($result) == 0){
            return false;
        }
        return true;
    }

    public function create($ap_id,$fn,$ln,$dob,$p_no,$addr,$edu,$clg,$drg,$skill){
      $query = "INSERT INTO resumes VALUES('','$ap_id','$fn','$ln','$dob','$p_no','$addr','$edu','$clg','$drg','$skill')";
      $result = mysqli_query($this->con,$query);
      return $result;
    }

    public function update($ap_id,$fn,$ln,$dob,$p_no,$addr,$edu,$clg,$drg,$skill){
        $result = mysqli_query($this->con,"UPDATE resumes SET 
                                first_name='$fn',last_name='$ln',date_of_birth='$dob',contact_no='$p_no',
                                addrs='$addr' ,education_status='$edu',university='$clg',degree='$drg',skills='$skill'
                                WHERE applicant='$ap_id'");
        return $result;
    }



}
?>