<?php 
class Post{
    private $con;
    private $id;
    private $title;
    private $postion;
    private $location;
    private $enterpriseId;
    private $skills;
    private $details;
    private $postedOn;
    
    public function __construct($con,$id){
        $this->con = $con;
        $this->id = $id;

        $result = mysqli_query($this->con,"SELECT * FROM posts WHERE id='$this->id' LIMIT 1"); 
        $row = mysqli_fetch_array($result);
        $this->title = $row["title"];
        $this->postion = $row["postion"];
        $this->location = $row["location"];
        $this->enterpriseId = $row["enterprise"];
        $this->skills = $row["skills"];
        $this->details = $row["details"];
        $this->postedOn = $row["postedOn"];
    }

    public function getTitle(){
        return $this->title;
    }
    public function getPostion(){
        return $this->postion;
    }
    public function getLocation(){
        return $this->location;
    }
    public function getEnterpriseId(){
        return $this->enterpriseId;
    }
    public function getSkills(){
        return $this->skills;
    }
    public function getDetails(){
        return $this->details;        
    }
    public function getEnterprise(){
        $result = mysqli_query($this->con,"SELECT name from enterprise WHERE id='$this->enterpriseId' LIMIT 1");
        $row = mysqli_fetch_array($result);
        return $row["name"];
    }
    public function getPostedOn(){
        return $this->postedOn;
    }

    public static function ApplicantCount($con,$post_id,$enterprise_id){
        $result = mysqli_query($con,"SELECT * FROM jobApplications WHERE post='$post_id' AND enterprice='$enterprise_id' ");
        return mysqli_num_rows($result);
    }

}
?>
