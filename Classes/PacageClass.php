<?php 
include_once 'db.php';
class PacageClass extends DB
{
        public $db;
        public function __construct()
        {
            $conn = $this->connect();
        }
    
    // public function check()
    //     {
    //       $insert = $this->conn->query("INSERT INTO users (name) VALUES ('John')");
    //       if ( $insert=== TRUE) {
    //         echo "New record created successfully";
    //       } else {
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //       }
    //     }
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

        public function ApplyPack($data,$package_id,$user_id){
            $pack_price = mysqli_real_escape_string($this->conn, $data['pack_price']);
            $pack_month = mysqli_real_escape_string($this->conn, $data['pack_month']);
            $pack_discount = mysqli_real_escape_string($this->conn, $data['pack_discount']);

            $que = $this->conn->query("SELECT * FROM order_table WHERE pack_id=$package_id AND status=0 AND user_id=$user_id");
            $value = mysqli_fetch_array($que);
            if (mysqli_num_rows($que)>0) {
                $txt = "<div class='alert alert-danger'>Already added</div>";
                return $txt;
             }else{

                 $qry = "INSERT INTO order_table(user_id,pack_id,pack_price,pack_month,pack_discount)VALUES('$user_id','$package_id','$pack_price','$pack_month','$pack_discount')";
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
         
            $qry = "SELECT * FROM order_table INNER JOIN user_table ON order_table.user_id=user_table.user_id INNER JOIN package_table ON order_table.pack_id=package_table.package_id ORDER by status ASC";
            $result = $this->conn->query($qry);
            return $result;
        }

        public function viewOrder(){
            $id = $_SESSION['user_id'];
            $qry = "SELECT * FROM order_table INNER JOIN user_table ON order_table.user_id=user_table.user_id INNER JOIN package_table ON order_table.pack_id=package_table.package_id where order_table.user_id=$id";
            $result = $this->conn->query($qry);
            return $result;
        }

        public function removeorder($order)
        {
            $id = $_SESSION['user_id'];
            $qry = "DELETE  FROM order_table WHERE user_id=$id AND order_id = $order";
            $result = $this->conn->query($qry);
            if ($result) {
                return "<span style='color:green'>Order Cancelled </span>";
            }else{
                return "<span style='color:green'>Something Wrong</span>";
            }
        }
}
?>