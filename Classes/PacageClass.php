<?php 
include_once 'db.php';
class PacageClass extends DB
{
        public $db;
        public function __construct()
        {
            $conn = $this->connect();
        }
    
        public function createnewcustomer($data,$file,$package_id){
            $first_name = mysqli_real_escape_string($this->conn, $data['first_name']);
            $last_name = mysqli_real_escape_string($this->conn, $data['last_name']);
            $email = mysqli_real_escape_string($this->conn, $data['email']);
            $password = "";
            $dob = mysqli_real_escape_string($this->conn, $data['dob']);
            $gender = mysqli_real_escape_string($this->conn, $data['gender']);
            $mobile = mysqli_real_escape_string($this->conn, $data['mobile']);
            $address = mysqli_real_escape_string($this->conn, $data['address']); 

            
            $add = "+8801";
            $mobileno = $add.$mobile;

            $query = "SELECT * FROM user_table WHERE email='$email'";
        $ress = $this->conn->query($query);
        $querya = "SELECT * FROM user_table WHERE  mobile='$mobile'";
        $resa = $this->conn->query($querya);
            $q = "SELECT * FROM package_table where package_id=$package_id";
                $res = $this->conn->query($q);
                $res = mysqli_fetch_assoc($res);
                $pack_price = $res['price'];
                $pack_month = $res['month'];
                $pack_discount = $res['discount'];

//image uploader 
                $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $file['image']['name'];
                $file_size = $file['image']['size'];
                $file_temp = $file['image']['tmp_name'];
    
                $div            = explode('.', $file_name);
                $file_ext       = strtolower(end($div));
                $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "img/".$unique_image;
                $move_image = "img/".$unique_image;
                    
    
            if (empty($first_name) || empty($last_name) || empty($email) || empty($dob) || empty($gender) || empty($mobile) || empty($address)) {
                    $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                    return $txt;
             } elseif (!preg_match ("/^[a-zA-z]*$/", $first_name) ){
                        $txt = "<span style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For First name</span>";
                        return $txt;
                    }elseif (!preg_match ("/^[a-zA-z]*$/", $last_name) ){
                        $txt = "<span style='color:red; font-size: 15px;'>Only alphabets and whitespace are allowed For First name</span>";
                        return $txt;
                    }elseif (mysqli_num_rows($ress)>0){

                        $qry1 = "INSERT INTO order_table(mobile_no,pack_id,pack_price,pack_month,pack_discount,status)VALUES('$mobileno','$package_id','$pack_price','$pack_month','$pack_discount','1')";
                        $result1 = $this->conn->query($qry1);
    
                        if($result1){
                            $txt = "<div class='alert alert-success'>Successfully New Member added</div>";
                            return $txt;
                        }
                    }
                    elseif (mysqli_num_rows($resa)>0){
                        $txt = "<span style='color:red; font-size: 15px;'>This Mobile Number Already been Registered </span>";
                        return $txt;
                    }elseif ( strlen ($mobile) != 9) {  
                        return "<span style = 'color:red';>Mobile must have 9 digits.</span>";  
                                 
                    }
                    elseif(empty($file_ext)){
                         $txt = "<span style='color:red; font-size: 15px;'>Image is required</span>";
                         return $txt;
                    }
                    
                    
                    else{
           

                    $qry = "INSERT into user_table(first_name,last_name,email,password,dob,gender,mobile,address,image) values('$first_name','$last_name','$email','$password','$dob','$gender','$mobileno','$address','$uploaded_image')";
                    $result = $this->conn->query($qry);
                    if ($result) {  
                        move_uploaded_file($file_temp, $move_image);
                   
                    $qry1 = "INSERT INTO order_table(mobile_no,pack_id,pack_price,pack_month,pack_discount,status)VALUES('$mobileno','$package_id','$pack_price','$pack_month','$pack_discount','1')";
                    $result1 = $this->conn->query($qry1);

                    if($result1){
                        $txt = "<div class='alert alert-success'>Successfully New Member added</div>";
                        return $txt;
                    }
                }
               
            }
        }
        public function insertPackage($data){
          $pack_name = mysqli_real_escape_string($this->conn, $data['pack_name']);
          $details = mysqli_real_escape_string($this->conn, $data['details']);
          $month = mysqli_real_escape_string($this->conn, $data['month']);
          $price = mysqli_real_escape_string($this->conn, $data['price']);
          $discount = mysqli_real_escape_string($this->conn, $data['discount']);

          if (empty($pack_name) || empty($details) || empty($month) || empty($price) || empty($discount)) {
                $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                return $txt;
          }else{
                $qry = "INSERT into package_table(pack_name,details,month,price,discount) values('$pack_name','$details','$month','$price','$discount')";
                $result = $this->conn->query($qry);
                if($result){
                    $txt = "<div class='alert alert-success'>Successfully inserted</div>";
                    return $txt;
                }
            }
        }

        public function viewPackage(){
            $qry = "SELECT * FROM package_table where del_pack=0";
            $result = $this->conn->query($qry);
            return $result;
        }

        public function ShowSelectedpack($package_id){
            $qry = "SELECT * FROM package_table WHERE package_id='$package_id' AND del_pack=0";
            $result = $this->conn->query($qry);
            return $result;
        }
        
        public function deletePackage($id){
            
			$qry = "UPDATE package_table
                    SET
                    del_pack                = '1'
                    WHERE package_id        = $id";
            $result = $this->conn->query($qry);
            if($result === TRUE){
                $txt = "<div class='alert alert-success'>Successfully Deleted</div>";
                return $txt;
            }
        }

        public function viewSinglePackage($packageid){
            $qry = "SELECT * FROM package_table WHERE package_id='$packageid'";
            $result = $this->conn->query($qry);
            return $result;
        }

        public function updatePackage($data,$packageid){
            $pack_name = mysqli_real_escape_string($this->conn, $data['pack_name']);
            $details = mysqli_real_escape_string($this->conn, $data['details']);
            $month = mysqli_real_escape_string($this->conn, $data['month']);
            $price = mysqli_real_escape_string($this->conn, $data['price']);
            $discount = mysqli_real_escape_string($this->conn, $data['discount']);

            if (empty($pack_name) || empty($details) || empty($month) || empty($price) || empty($discount)) {
                $txt = "<div class='alert alert-danger'>Field must not be empty</div>";
                return $txt;
            }else{
                    $qry = "UPDATE package_table
                    SET
                    pack_name               = '$pack_name',
                    details          		= '$details',
                    month          	        = '$month',
                    price             	    = '$price',
                    discount                = '$discount'

                    WHERE package_id        = '$packageid'";
                    $result = $this->conn->query($qry);
                    if($result){
                        $txt = "<div class='alert alert-success'>Successfully updated</div>";
                        return $txt;
                    }
                }
        }

        public function ApplyPack($data,$package_id,$mobile){
            $pack_price = mysqli_real_escape_string($this->conn, $data['pack_price']);
            $pack_month = mysqli_real_escape_string($this->conn, $data['pack_month']);
            $pack_discount = mysqli_real_escape_string($this->conn, $data['pack_discount']);

            $que = $this->conn->query("SELECT * FROM order_table WHERE pack_id=$package_id AND status=0 AND mobile_no=$mobile");
            $value = mysqli_fetch_array($que);
            if (mysqli_num_rows($que)>0) {
                $txt = "<div class='alert alert-danger'>Already added</div>";
                return $txt;
             }else{

                 $qry = "INSERT INTO order_table(mobile_no,pack_id,pack_price,pack_month,pack_discount)VALUES('$mobile','$package_id','$pack_price','$pack_month','$pack_discount')";
                 $result = $this->conn->query($qry);
                     if($result){
                         $txt = "<div class='alert alert-success'>Order Successfully</div>";
                         return $txt;
                     }
             }

        }
        public function confirmorder($order)
        {
            $qry = "UPDATE order_table
                    SET
                    status               = '1' 
                    WHERE order_id        = '$order'";
                    $result = $this->conn->query($qry);
                    if($result){
                        $txt = "<div class='alert alert-success'>Approved</div>";
                        return $txt;
                    }
        }
        public function viewOrderadmin(){
         
            $qry = "SELECT * FROM order_table INNER JOIN user_table ON order_table.mobile_no=user_table.mobile INNER JOIN package_table ON order_table.pack_id=package_table.package_id ORDER by status ASC";
            $result = $this->conn->query($qry);
            return $result;
        }

        public function viewOrder(){
            $mobile = $_SESSION['mobile'];
            $qry = "SELECT * FROM order_table INNER JOIN user_table ON order_table.mobile_no=user_table.mobile INNER JOIN package_table ON order_table.pack_id=package_table.package_id where order_table.mobile_no='$mobile'";
            $result = $this->conn->query($qry);
            // $row = mysqli_num_rows($result);
            // if ($row>0) {
               
            // }
            return $result;
        }

        public function removeorder($order)
        {
            $mobile = $_SESSION['mobile'];
            $qry = "DELETE  FROM order_table WHERE mobile_no=$mobile AND order_id = $order";
            $result = $this->conn->query($qry);
            if ($result) {
                return "<span style='color:green'>Order Cancelled </span>";
            }else{
                return "<span style='color:green'>Something Wrong</span>";
            }
        }
}
?>