<?php 
include_once 'db.php';
class idcardClass extends DB
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
        public function generateidcard($orderid){
            $qry = "SELECT * FROM order_table LEFT JOIN package_table ON order_table.pack_id= package_table.package_id LEFT JOIN user_table ON user_table.mobile = order_table.mobile_no  WHERE order_id='$orderid' AND status=1";
            $result = $this->conn->query($qry);
            return mysqli_fetch_assoc($result);
             
}
}