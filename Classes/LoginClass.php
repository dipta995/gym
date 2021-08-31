<?php 
include_once 'db.php';
class LoginClass extends DB
{
    public $db;
    public function __construct()
    {
        $conn = $this->connect();
    }

    public function checkprofile()
    {
        $id = $_SESSION['user_id'];
        $que = "SELECT * FROM user_table WHERE user_id = $id";
        $result = $this->conn->query($que);
            return $result;
    }
    
    public function adminlogin($email, $pass){
        $result = $this->conn->query("SELECT * FROM admin_table WHERE admin_email = '$email' AND admin_password='$pass'");
        $value = mysqli_fetch_array($result);
        
            if (mysqli_num_rows($result)>0) {
                session_start();
                 $_SESSION['loginauth'] = 'admin';
                $_SESSION['admin_id'] = $value['admin_id'];
                $_SESSION['admin_email'] = $value['admin_email'];
                echo "<script> window.location = 'index.php';</script>";
             }
             else{
                 $txt = "<div style='color:red; font-size: 15px;'>Incorrect email and password...!</div>";
                return $txt;
            }
    }
        
    // User registration 
    public function insertUser($data){
        $first_name = mysqli_real_escape_string($this->conn, $data['first_name']);
        $last_name = mysqli_real_escape_string($this->conn, $data['last_name']);
        $email = mysqli_real_escape_string($this->conn, $data['email']);
        $password = mysqli_real_escape_string($this->conn, $data['password']);
        $dob = mysqli_real_escape_string($this->conn, $data['dob']);
        $gender = mysqli_real_escape_string($this->conn, $data['gender']);
        $mobile = mysqli_real_escape_string($this->conn, $data['mobile']);
        $address = mysqli_real_escape_string($this->conn, $data['address']);

        if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($dob) || empty($gender) || empty($mobile) || empty($address)) {
                $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                return $txt;
        }else{
                $qry = "INSERT into user_table(first_name,last_name,email,password,dob,gender,mobile,address) values('$first_name','$last_name','$email','$password','$dob','$gender','$mobile','$address')";
                $result = $this->conn->query($qry);
                if($result){
                    $txt = "<div class='alert alert-success'>Successfully inserted</div>";
                    return $txt;
                }
            }
    }

    // User Login
    public function userLogin($email,$password, $link){
        $qry = "SELECT * FROM user_table WHERE email='$email' AND password='$password'";
        $result = $this->conn->query($qry);
        $value = mysqli_fetch_array($result);
			
        if (mysqli_num_rows($result)>0) {
            $_SESSION['loginauth'] = 'user';
            $_SESSION['user_id'] = $value['user_id'];
            $_SESSION['email'] = $value['email'];
                if (empty($link)|| $link==NULL) {
                header('Location: index.php');
                }else{
                    echo "<script> window.location = '$link';</script>";
                }
            }
        else{
            return $txt = "<div style='color:red; font-size: 15px;'>Incorrect email and password...!</div>";;
        }
    }
}
?>