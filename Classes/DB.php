<?php 
class DB 
{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "gym";
    public $conn;
    public function connect(){
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
          die("Connection failed: " . $this->conn->connect_error);
        }
        else{
            return $msg =  "connected";
        }
    }
}
 
?>