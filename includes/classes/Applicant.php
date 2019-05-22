<?php 
class Applicant{
    private $con;
    private $errors;
    public function __construct($con){
        $this->con = $con;
        $this->errors = array();
    }
    public function getAllError($errors_string){
        if(!in_array($errors_string,$this->errors)){
            $errors_string = "";
        }
        return "<span class='text-danger animated bounceIn'>$errors_string</span>";
    } 
    public function register($name,$email,$password,$password2){
        $this->validate_username($name);
        $this->validate_email($email);
        $this->validate_password($password,$password2);
        if(empty($this->errors) == true){
            return $this->createNewApplicant($name,$email,$password);
        }
        else{
            return false;  
        }

    }
    private function createNewApplicant($name,$email,$password){
        $passwordHash = md5($password);
        $result = mysqli_query($this->con,"INSERT into applicant VALUES('','$name','$email','$passwordHash')");
        return $result;
    }
    public function getId($email){
        $result = mysqli_query($this->con,"SELECT id FROM applicant WHERE email='$email' LIMIT 1");
        $row = mysqli_fetch_array($result);
        return $row['id'];
    }
    // validaions
    private function validate_username($name){
        if (strlen($name) > 25 || strlen($name) < 3){
            array_push($this->errors,Constants::$fn_invalid);
            return;
        }
    }

    private function validate_password($pass,$pass2){
        if($pass != $pass2){
            array_push($this->errors,Constants::$pass_match);
            return;
        }
        if(preg_match('/[^A-Za-z0-9]/',$pass)){
            array_push($this->errors,Constants::$pass_type);
            return;
        }
        if (strlen($pass) < 6){
            array_push($this->errors,Constants::$pass_len);
            return;
        }  
    }
    
    private function validate_email($email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            array_push($this->errors,Constants::$em_invalid);
            return;
        }
        $checkEmailQuery = mysqli_query($this->con,"SELECT email FROM  applicant WHERE email='$email'");
        if(mysqli_num_rows($checkEmailQuery)!= 0 ){
            array_push($this->errors,Constants::$emailNameExist);
        } 
    }
}
?>
