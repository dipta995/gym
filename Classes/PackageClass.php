<?php 
include_once 'db.php';
class PackageClass extends DB
{
    public $db;
    public function __construct()
    {
        $conn = $this->connect();
    }

    // Insert Package
    public function insertPackage($data){
        $pack_name  = mysqli_real_escape_string($this->conn, $data['pack_name']);
        $details    = mysqli_real_escape_string($this->conn, $data['details']);
        $month      = mysqli_real_escape_string($this->conn, $data['month']);
        $price      = mysqli_real_escape_string($this->conn, $data['price']);
        $discount   = mysqli_real_escape_string($this->conn, $data['discount']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        

        if (empty($pack_name) || empty($details) || empty($file_name) || empty($month) || empty($price)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } elseif ($file_size >1048567) {
            $txt = "<div class='alert alert-danger'>Image Size should be less then 1MB!</div>";
            return $txt;
        } elseif (in_array($file_ext, $permited) === false) {
            $txt = "<div class='alert alert-danger'>You can upload only: " .implode(', ', $permited)."</div>";
            return $txt;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT into package_table(pack_name, details, image, month, price, discount) values('$pack_name', '$details', '$uploaded_image', '$month', '$price', '$discount')";
            $result = $this->conn->query($query);
            if ($result) {
                $txt = "<div class='alert alert-success'>Successfully Inserted!</div>";
                return $txt;
            }
        }
    }
    
    // View Package
    public function viewPackage(){
        $qry = "SELECT * FROM package_table where del_pack=0";
        $result = $this->conn->query($qry);
        return $result;
    }

    // Show Selected Package
    public function ShowSelectedpack($package_id){
        $qry = "SELECT * FROM package_table WHERE package_id='$package_id' AND del_pack=0";
        $result = $this->conn->query($qry);
        return $result;
    }
    
    // Delete Package
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

    // View Single Package
    public function viewSinglePackage($packageid){
        $qry = "SELECT * FROM package_table WHERE package_id='$packageid'";
        $result = $this->conn->query($qry);
        return $result;
    }

    // Update Package
    public function updatePackage($data,$packageid){
        $pack_name = mysqli_real_escape_string($this->conn, $data['pack_name']);
        $details   = mysqli_real_escape_string($this->conn, $data['details']);
        $month     = mysqli_real_escape_string($this->conn, $data['month']);
        $price     = mysqli_real_escape_string($this->conn, $data['price']);
        $discount  = mysqli_real_escape_string($this->conn, $data['discount']);
        
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        
        if (empty($pack_name) || empty($details) || empty($month) || empty($price)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } else {
            if(!empty($file_name)){ 
                if ($file_size >1048567) {
                    echo "<div class='error'>Image Size should be less then 1MB!</div ";
                } elseif (in_array($file_ext, $permited) === false) {
                    echo "<div class='error'>You can upload only: " .implode(', ', $permited)."</div>";
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE package_table
                              SET 
                              pack_name           = '$pack_name',
                              details             = '$details',
                              image               = '$uploaded_image',
                              month               = '$month',
                              price               = '$price',
                              discount            = '$discount'
                              WHERE package_id    = '$packageid'";

                    $result = $this->conn->query($query);
                    if ($result) {
                        $txt = "<div class='alert alert-success'>Successfully updated!</div>";
                        return $txt;
                    }
                }
            } else {
                $query = "UPDATE package_table
                SET 
                pack_name           = '$pack_name',
                details             = '$details',
                month               = '$month',
                price               = '$price',
                discount            = '$discount'
                WHERE package_id    = '$packageid'";

                $result = $this->conn->query($query);
                if ($result) {
                    $txt = "<div class='alert alert-success'>Successfully updated!</div>";
                    return $txt;
                }
            }
        }
    }

    // Apply Package
    public function ApplyPack($data,$package_id,$mobile){
        $pack_price = mysqli_real_escape_string($this->conn, $data['pack_price']);
        $pack_month = mysqli_real_escape_string($this->conn, $data['pack_month']);
        $pack_discount = mysqli_real_escape_string($this->conn, $data['pack_discount']);
        $trainer = mysqli_real_escape_string($this->conn, $data['trainer']); 

        $que = $this->conn->query("SELECT * FROM order_table WHERE pack_id=$package_id AND status=0 AND mobile_no=$mobile");
        $value = mysqli_fetch_array($que);
        if ($value > 0) {
            $txt = "<div class='alert alert-danger'>Already added!</div>";
            return $txt;
        }else{
            $qry = "INSERT INTO order_table(mobile_no,pack_id,pack_price,pack_month,pack_discount,trainer_id)VALUES('$mobile','$package_id','$pack_price','$pack_month','$pack_discount','$trainer')";
            $result = $this->conn->query($qry);
            if($result){
                $txt = "<div class='alert alert-success'>Order Successful!</div>";
                return $txt;
            }
        }
    }

    // Confirm Order
    public function confirmorder($order){
        $qry = "UPDATE order_table
                SET
                status               = '1' 
                WHERE order_id        = '$order'";
                $result = $this->conn->query($qry);
        if($result){
            $txt = "<div class='alert alert-success'>Order Confirmed!</div>";
            return $txt;
        }
    }

    // View Order From Admin Panel
    public function viewOrderadmin(){       
        $qry = "SELECT * FROM order_table 
        LEFT JOIN employee_table ON order_table.trainer_id = employee_table.emp_id 
        INNER JOIN package_table ON order_table.pack_id = package_table.package_id 
        INNER JOIN user_table ON order_table.mobile_no = user_table.mobile 
        LEFT JOIN product_table ON order_table.product_id = product_table.id
        ORDER by status ASC";
        $result = $this->conn->query($qry);
        return $result;
    }

    // View Order
    public function viewOrder(){
        $mobile = $_SESSION['mobile'];
        $qry = "SELECT * FROM order_table 
        INNER JOIN user_table ON order_table.mobile_no = user_table.mobile 
        INNER JOIN package_table ON order_table.pack_id = package_table.package_id 
        where order_table.mobile_no = '$mobile'";
        $result = $this->conn->query($qry);
        return $result;
    }

    public function removeEmp($id){  
        $qry = "DELETE  FROM employee_table WHERE emp_id=$id";
        $result = $this->conn->query($qry);
        if ($result) {
            return "<span style='color:green'>Order Cancelled!</span>";
        }else{
            return "<span style='color:green'>Something went wrong!</span>";
        }
    }

    public function removeorder($order){
        $mobile = $_SESSION['mobile'];
        $qry = "DELETE  FROM order_table WHERE mobile_no=$mobile AND order_id = $order";
        $result = $this->conn->query($qry);
        if ($result) {
            return "<span style='color:green'>Order Cancelled!</span>";
        }else{
            return "<span style='color:green'>Something went Wrong!</span>";
        }
    }

    public function confirmbuypackbyadmin($data,$packid){
        $mobile_no = mysqli_real_escape_string($this->conn, $data['mobile_no']);
        $trainer = mysqli_real_escape_string($this->conn, $data['trainer']);
        $que = $this->conn->query("SELECT * FROM order_table WHERE pack_id=$packid AND status=0 AND mobile_no=$mobile_no");
        $value = mysqli_fetch_array($que);
        if (mysqli_num_rows($que)>0) {
            $txt = "<div class='alert alert-danger'>Already added!</div>";
            return $txt;
        }else{
            $que = $this->conn->query("SELECT * FROM package_table WHERE package_id=$packid");
            $data = mysqli_fetch_array($que);
            $pack_price = $data['price'];
            $pack_month = $data['month'];
            $pack_discount = $data['discount'];
            $qry = "INSERT INTO order_table(mobile_no,pack_id,pack_price,pack_month,pack_discount,trainer_id,status)VALUES('$mobile_no','$packid','$pack_price','$pack_month','$pack_discount','$trainer','1')";
            $result = $this->conn->query($qry);
            if($result){
                $txt = "<div class='alert alert-success'>Order Successful!</div>";
                return $txt;
            }
        }
    }
}
