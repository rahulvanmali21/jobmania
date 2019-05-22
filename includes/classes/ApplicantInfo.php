<?php 
class ApplicantInfo{
    public static function getApplicantEmail($con,$id){
        $result = mysqli_query($con,"SELECT email FROM applicant WHERE id='$id'");
        $row = mysqli_fetch_array($result);
        return $row["email"];
    } 
    public static function getApplicantAge($con,$id){
        $result = mysqli_query($con,"SELECT date_of_birth FROM resumes WHERE applicant='$id'");
        $row = mysqli_fetch_array($result);
        $applicnt_dob = new DateTime($row["date_of_birth"]);
        $now = new DateTime();
        $dif = $now->diff($applicnt_dob);
        return $dif->y;

    }
    public static function getApplicantFullName($con,$id){
        $result = mysqli_query($con,"SELECT name FROM applicant WHERE id='$id'");
        $row = mysqli_fetch_array($result);
        return $row["name"];
    }
    public static function getStatus($con,$post_id,$applicant_id){
        $result = mysqli_query($con,"SELECT status FROM jobApplications WHERE post='$post_id' AND applicant='$applicant_id'");
        $row = mysqli_fetch_array($result);
        return $row["status"];
    }
}

?>