<?php 
class EnterpriseAccount{
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
        $this->validate_enterprice($name);
        $this->validate_email($email);
        $this->validate_password($password,$password2);
        if(empty($this->errors) == true){
            return $this->CreateNewAccount($name,$email,$password);
        }else{
            return false;
        }
    }
    private function CreateNewAccount($name,$email,$password){
        $hashed = md5($password);
        $result = mysqli_query($this->con,"INSERT INTO enterprise VALUES('','$name','$email','$hashed')");
        return $result;
    }
    public function getId($name){
        $query = mysqli_query($this->con,"SELECT id from enterprise WHERE name='$name' LIMIT 1");
        $result = mysqli_fetch_array($query);
        return $result["id"];
    }
    public function getName($id){
        $query = mysqli_query($this->con,"SELECT name from enterprise WHERE id='$id' LIMIT 1");
        $result = mysqli_fetch_array($query);
        return $result["name"];
    }
    // Vaidations
    private function validate_enterprice($name){
        if (strlen($name) > 25 || strlen($name) < 3){
            array_push($this->errors,Constants::$UserNameExist);
            return;
        }
        $checkenterpriceNameQuery = mysqli_query($this->con,"SELECT name FROM  enterprise WHERE name='$name'");
        if(mysqli_num_rows($checkenterpriceNameQuery)!= 0 ){
            array_push($this->errors,Constants::$UserNameExist);
        }
    }

    private function validate_password($pass,$pass2){
        if(preg_match('/[^A-Za-z0-9]/',$pass)){
            array_push($this->errors,Constants::$pass_type);
            return;
        }
        if (strlen($pass) < 6){
            array_push($this->errors,Constants::$pass_len);
            return;
        }
        if (strlen($pass2) < 6){
            array_push($this->errors,Constants::$pass_len);
            return;
        }   
        if($pass != $pass2){
            array_push($this->errors,Constants::$pass_match);
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
    public static function validate_session($con,$id,$name){
        $row =   mysqli_num_rows(mysqli_query($con,"SELECT * FROM enterprise WHERE name='$name' AND id='$id'"));
        if($row == 1){
            return true;
        }else {
            return false;
        }
    }
    public static function getEmail($con,$id){
       $row = mysqli_fetch_array(mysqli_query($con,"SELECT email FROM enterprise WHERE id='$id'"));
        return $row["email"];
    }
}
?>