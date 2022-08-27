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
            $_SESSION['admin_status'] = $value['admin_status'];
            echo "<script> window.location = 'index.php';</script>";
         }
         else{
             $txt = "<div style='color:red; font-size: 15px;'>Incorrect email and password...!</div>";
            return $txt;
        }   
    }
        
    // User registration 
    public function insertUser($data,$file){
        $first_name = mysqli_real_escape_string($this->conn, $data['first_name']);
        $last_name = mysqli_real_escape_string($this->conn, $data['last_name']);
        $email = mysqli_real_escape_string($this->conn, $data['email']);
        $password = mysqli_real_escape_string($this->conn, $data['password']);
        $dob = mysqli_real_escape_string($this->conn, $data['dob']);
        $gender = mysqli_real_escape_string($this->conn, $data['gender']);
        $mobile = mysqli_real_escape_string($this->conn, $data['mobile']);
        $address = mysqli_real_escape_string($this->conn, $data['address']);
        $def="+8801";
        $mobileno = $def.$mobile;
        $query = "SELECT * FROM user_table WHERE email='$email'";
        $res = $this->conn->query($query);
        $querya = "SELECT * FROM user_table WHERE  mobile='$mobile'";
        $resa = $this->conn->query($querya);

        $otp = time();
        $birthdate = new DateTime($dob);
        $now = new DateTime();
        $interval = $now->diff($birthdate);
           

        if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($dob) || empty($gender) || empty($mobile) || empty($address)) {
                $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                return $txt;
        }elseif (!preg_match ("/^[a-zA-z]*$/", $first_name) ){
            $txt = "<span style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For First name</span>";
            return $txt;
        }elseif (!preg_match ("/^[a-zA-z]*$/", $last_name) ){
            $txt = "<span style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For First name</span>";
            return $txt;
        }elseif (mysqli_num_rows($res)>0){
            $txt = "<span style='color:red; font-size: 15px;'>This Email Already been Registered </span>";
            return $txt;
        }
        elseif (mysqli_num_rows($resa)>0){
            $txt = "<span style='color:red; font-size: 15px;'>This Mobile Number Already been Registered </span>";
            return $txt;
        }elseif ( strlen ($mobile) != 9) {  
            return "<span style = 'color:red';>Mobile must have 9 digits.</span>";  
                     
        }elseif ( strlen ($password) < 6) {  
            return "<span style = 'color:red';>Password must have 6 digits.</span>";  
                     
        }
        elseif ( $interval->y < 16) {  
            return "<span style = 'color:red';>Minimum 16 Year Required.</span>";  
                     
        }
        
        
        
        else{

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div            = explode('.', $file_name);
            $file_ext       = strtolower(end($div));
            $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "img/".$unique_image;
            $move_image = "img/".$unique_image;
           

           
           if(empty($file_ext)){
                $txt = "<span style='color:red; font-size: 15px;'>Image is required</span>";
                return $txt;
           }else if ($file_size >1048567) {
            return "<span class='error'>Image Size should be less then 1MB! </span>";
           } elseif (in_array($file_ext, $permited) === false) {
            return "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
           }
           
           else{
                move_uploaded_file($file_temp, $move_image);
           
                $qry = "INSERT into user_table(first_name,last_name,email,password,dob,gender,mobile,address,image,otp,flag) values('$first_name','$last_name','$email','$password','$dob','$gender','$mobileno','$address','$uploaded_image','$otp','1')";
                $result = $this->conn->query($qry);
                
                if($result){
                    // $txt = "<div class='alert alert-success'></div>";
                    // return $txt;
                  $this->sendmail($email,$otp);
                    return "<script>window.location='confirmotp.php?id=$email';</script>";
                }
                else{
                    $txt = "<div class='alert alert-danger'>Something wrong</div>";
                    return $txt;
                }
            }
            }
    }
    public function insertUserAdmin($data,$file){
        $first_name = mysqli_real_escape_string($this->conn, $data['first_name']);
        $last_name = mysqli_real_escape_string($this->conn, $data['last_name']);
        $email = mysqli_real_escape_string($this->conn, $data['email']);
        $password = mysqli_real_escape_string($this->conn, $data['password']);
        $dob = mysqli_real_escape_string($this->conn, $data['dob']);
        $gender = mysqli_real_escape_string($this->conn, $data['gender']);
        $mobile = mysqli_real_escape_string($this->conn, $data['mobile']);
        $address = mysqli_real_escape_string($this->conn, $data['address']);
        $def="+8801";
        $mobileno = $def.$mobile;
        $query = "SELECT * FROM user_table WHERE email='$email'";
        $res = $this->conn->query($query);
        $querya = "SELECT * FROM user_table WHERE  mobile='$mobile'";
        $resa = $this->conn->query($querya);

        $otp = time();
    
        $birthdate = new DateTime($dob);
          $now = new DateTime();
          $interval = $now->diff($birthdate);
        if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($dob) || empty($gender) || empty($mobile) || empty($address)) {
                $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                return $txt;
        }elseif (!preg_match ("/^[a-zA-z]*$/", $first_name) ){
            $txt = "<span style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For First name</span>";
            return $txt;
        }elseif (!preg_match ("/^[a-zA-z]*$/", $last_name) ){
            $txt = "<span style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For First name</span>";
            return $txt;
        }elseif (mysqli_num_rows($res)>0){
            $txt = "<span style='color:red; font-size: 15px;'>This Email Already been Registered </span>";
            return $txt;
        }
        elseif (mysqli_num_rows($resa)>0){
            $txt = "<span style='color:red; font-size: 15px;'>This Mobile Number Already been Registered </span>";
            return $txt;
        }elseif ( strlen ($mobile) != 9) {  
            return "<span style = 'color:red';>Mobile must have 9 digits.</span>";  
                     
        }elseif ( strlen ($password) < 6) {  
            return "<span style = 'color:red';>Password must have 6 digits.</span>";  
                     
        } elseif ( $interval->y < 16) {  
            return "<span style = 'color:red';>Minimum 16 Year Required.</span>";  
                     
        }
        
        
        else{

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div            = explode('.', $file_name);
            $file_ext       = strtolower(end($div));
            $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "img/".$unique_image;
            $move_image = "../img/".$unique_image;
           

           
           if(empty($file_ext)){
                $txt = "<span style='color:red; font-size: 15px;'>Image is required</span>";
                return $txt;
           }else if ($file_size >1048567) {
            return "<span class='error'>Image Size should be less then 1MB! </span>";
           } elseif (in_array($file_ext, $permited) === false) {
            return "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
           }
           
           else{
                move_uploaded_file($file_temp, $move_image);
           
                $qry = "INSERT into user_table(first_name,last_name,email,password,dob,gender,mobile,address,image,otp,flag) values('$first_name','$last_name','$email','$password','$dob','$gender','$mobileno','$address','$uploaded_image','$otp','0')";
                $result = $this->conn->query($qry);
                
                if($result){
                    $txt = "<div class='alert alert-success'>Successfully New Customer Created</div>";
                    return $txt;
                 
                }
                else{
                    $txt = "<div class='alert alert-danger'>Something wrong</div>";
                    return $txt;
                }
            }
            }
    }
    public function updateProfile($data,$file,$userid)
    {
        $first_name = mysqli_real_escape_string($this->conn, $data['first_name']);
        $last_name = mysqli_real_escape_string($this->conn, $data['last_name']);
        $mobile = mysqli_real_escape_string($this->conn, $data['mobile']);
        $password = mysqli_real_escape_string($this->conn, $data['password']);
        $def="+8801";
        $mobileno = $def.$mobile;
       
        $query = "SELECT * FROM user_table WHERE  mobile='$mobileno' and user_id !=$userid";
        $mobilecheck = $this->conn->query($query);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "img/".$unique_image;
        $move_image = "img/".$unique_image;
       




        if (empty($first_name) || empty($last_name) || empty($password) || empty($mobile)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
            return $txt;
    }elseif (!preg_match ("/^[a-zA-z]*$/", $first_name) ){
        $txt = "<span style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For First name</span>";
        return $txt;
    }elseif (!preg_match ("/^[a-zA-z]*$/", $last_name) ){
        $txt = "<span style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For First name</span>";
        return $txt;
    } 
    elseif (mysqli_num_rows($mobilecheck)>0){
        $txt = "<span style='color:red; font-size: 15px;'>This Mobile Number Already been Registered </span>";
        return $txt;
    }elseif ( strlen ($mobile) != 9) {  
        return "<span style = 'color:red';>Mobile must have 9 digits.</span>";  
                 
    }elseif ( strlen ($password) < 6) {  
        return "<span style = 'color:red';>Password must have 6 digits or More.</span>";  
                 
    }elseif (empty($file_ext)) {
        $qry = "UPDATE user_table
            SET
            
            first_name          		= '$first_name',
            last_name          		= '$last_name',
            password          		= '$password',
            mobile          		= '$mobileno'


            WHERE user_id        = '$userid'";
            $result = $this->conn->query($qry);
    }else{
        if ($file_size >1048567) {
            return "<span class='error'>Image Size should be less then 1MB! </span>";
           } elseif (in_array($file_ext, $permited) === false) {
            return "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
           }else{
        $qry = "UPDATE user_table
        SET
        
        first_name          		= '$first_name',
        last_name          		= '$last_name',
        password          		= '$password',
        mobile          		= '$mobileno',
        image                   = '$uploaded_image'
        

        WHERE user_id        = '$userid'";
        $result = $this->conn->query($qry);
        move_uploaded_file($file_temp, $move_image);
           }
    }
    
    
    }

    public function userList()
    {

            $qry = "SELECT * FROM user_table  where flag=0 order by user_id DESC";
            return $result = $this->conn->query($qry);
           
    }
    public function userListSingle($id)
    {

            $qry = "SELECT * FROM user_table  where user_id=$id";
             $result = $this->conn->query($qry);
           return $value = mysqli_fetch_array($result);
           
    }

    public function otpcheck($otp,$id)
    {
        $qry = "SELECT * FROM user_table WHERE email='$id' AND otp='$otp' and flag=1";
        $result = $this->conn->query($qry);
        
			
        if (mysqli_num_rows($result)>0) {

            $qry = "UPDATE user_table
            SET
            flag          		= '0' 
            WHERE email        = '$id'";
            $result = $this->conn->query($qry);
            return "<script>window.location='login.php';</script>";
         }else{
             $txt = "<div class='alert alert-danger'>Invalid Otp</div>";
                    return $txt;
         }
    }
    // User Login
    public function showuserdata($id)
    {
       
            $qry = "SELECT * FROM user_table WHERE user_id=$id and flag=0";
            $result = $this->conn->query($qry);
           return  mysqli_fetch_array($result);
    }
    
    public function userLogin($email,$password){
        $qry = "SELECT * FROM user_table WHERE email='$email' AND password='$password' and flag=0";
        $result = $this->conn->query($qry);
        $value = mysqli_fetch_array($result);
			
        if (mysqli_num_rows($result)>0) {
                $_SESSION['loginauth'] = 'user';
                $_SESSION['user_id'] = $value['user_id'];
                $_SESSION['email'] = $value['email'];
                $_SESSION['mobile'] = $value['mobile'];
                header('Location: index.php');
            }
        else{
            $txt = "<div style='color:red; font-size: 15px;'>Incorrect email and password!</div>";
            return $txt;
        }
    }

    public function updatepass($data,$id)
    {
        $password = mysqli_real_escape_string($this->conn, $data['password']);
        $password1 = mysqli_real_escape_string($this->conn, $data['password1']);
        if (empty($password) || empty($password1)) {
            return "<span style = 'color:red';>Field Must not be empty</span>";  
        }elseif ( strlen ($password) < 6) {  
            return "<span style = 'color:red';>Password must have 6 digits.</span>";  
                     
        }elseif ($password==$password1) {
           
            $qry = "UPDATE admin_table 
            SET
            admin_password                = $password
            WHERE admin_id        = $id";
    $result = $this->conn->query($qry);
    if ($result) {
        return "<span style = 'color:green';>Password Updated.</span>";  
    }
        }else{
            return "<span style = 'color:red';>Password Does not match.</span>";  
        }
        

    }

    
 
    public function sendmail($useremail,$otp){
        require("mail/src/PHPMailer.php");
 require("mail/src/SMTP.php");
 require("mail/src/Exception.php");
 require("mail/constants.php");
    $mail = new PHPMailer\PHPMailer\PHPMailer();
   
   try {
      
       $mail->IsSMTP(); // enable SMTP
   
       //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
       $mail->SMTPAuth = true; // authentication enabled
       $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
       $mail->Host = "smtp.gmail.com";
       $mail->Port = 465; // or 587
       $mail->IsHTML(true);
       $mail->Username = "robinhossainrabbiz5@gmail.com";
       $mail->Password =PASSWORD;
       $mail->SetFrom("robinhossainrabbiz5@gmail.com");
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   
        $mail->isHTML(true); 
       $mail->Subject = "Your Otp And link";
       $mail->Body = "$otp";
       $mail->AddAddress($useremail);
       $mail->Send();
       
   } catch (Exception $e) {
        
   }
   
   }
}
