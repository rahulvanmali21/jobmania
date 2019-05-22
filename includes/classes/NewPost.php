<?php 
class NewPost{
    private $errors;
    private $con;
    public function __construct($con){
        $this->con = $con;
    }
    public function post_new_add($title,$postion,$location,$enterprise,$skills,$details){
       return  $this->add_post($title,$postion,$location,$enterprise,$skills,$details);
    }
    private function add_post($title,$postion,$location,$enterprise,$skills,$details){
        $postedOn = date("Y-m-d");
        $query = "INSERT INTO posts VALUES('','$title','$postion','$location','$enterprise','$skills','$details','$postedOn')";
        $result = mysqli_query($this->con,$query);
        return $result;
    }
}
?>