<?php 
include_once 'db.php';
class ProductClass extends DB
{
    public $db;
    public function __construct()
    {
        $conn = $this->connect();
    }

    // Insert Product
    public function insertProduct($data){
        $name          = mysqli_real_escape_string($this->conn, $data['name']);
        $description   = mysqli_real_escape_string($this->conn, $data['description']);
        $buying_price  = mysqli_real_escape_string($this->conn, $data['buying_price']);
        $selling_price = mysqli_real_escape_string($this->conn, $data['selling_price']);
        $discount      = mysqli_real_escape_string($this->conn, $data['discount']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        

        if (empty($name) || empty($description) || empty($file_name) || empty($buying_price) || empty($selling_price)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } elseif ($file_size >1048567) {
            $txt = "<div class='alert alert-danger'>Image Size should be less then 1MB!</div>";
            return $txt;
        } elseif (in_array($file_ext, $permited) === false) {
            $txt = "<div class='alert alert-danger'>You can upload only: " .implode(', ', $permited)."</div>";
            return $txt;
        } else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT into product_table(name, description, image, buying_price, selling_price, discount) values('$name', '$description', '$uploaded_image', '$buying_price', '$selling_price', '$discount')";
            $result = $this->conn->query($query);
            if($result){
                $txt = "<div class='alert alert-success'>Successfully Inserted!</div>";
                return $txt;
            }
        }
    }

    // View Product
    public function viewProduct(){
        $qry = "SELECT * FROM product_table where soft_delete = 0 " ;
        $result = $this->conn->query($qry);
        return $result;
    }

    // View Single Product
    public function viewSingleProduct($productid){
        $query  = "SELECT * FROM product_table WHERE id='$productid'";
        $result = $this->conn->query($query);
        return $result;
    }

    // Show Selected Package
    public function ShowSelectedproduct($product_id){
        $qry = "SELECT * FROM product_table WHERE id='$product_id' AND soft_delete=0";
        $result = $this->conn->query($qry);
        return $result;
    }

    // Update Product
    public function updateProduct($data, $productid){
        $name          = mysqli_real_escape_string($this->conn, $data['name']);
        $description   = mysqli_real_escape_string($this->conn, $data['description']);
        $buying_price  = mysqli_real_escape_string($this->conn, $data['buying_price']);
        $selling_price = mysqli_real_escape_string($this->conn, $data['selling_price']);
        $discount      = mysqli_real_escape_string($this->conn, $data['discount']);
       
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        
        if (empty($name) || empty($description) || empty($buying_price) || empty($selling_price)) {
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
                    $query = "UPDATE product_table
                              SET 
                              name            = '$name',
                              description     = '$description',
                              image           = '$uploaded_image',
                              buying_price    = '$buying_price',
                              selling_price   = '$selling_price',
                              discount        = '$discount'
                              WHERE id        = '$productid'";

                    $result = $this->conn->query($query);
                    if ($result) {
                        $txt = "<div class='alert alert-success'>Successfully updated!</div>";
                        return $txt;
                    }
                }

            } else {
                $query = "UPDATE product_table
                SET 
                name            = '$name',
                description     = '$description',
                buying_price    = '$buying_price',
                selling_price   = '$selling_price',
                discount        = '$discount'
                WHERE id        = '$productid'";
                $result = $this->conn->query($query);
                if ($result) {
                    $txt = "<div class='alert alert-success'>Successfully updated!</div>";
                    return $txt;
                }
            }
        }
    }

    // Delete Product
    public function deleteProduct($id){        
        $query = "UPDATE product_table
                SET
                soft_delete  = '1'
                WHERE id     = $id";
        $result = $this->conn->query($query);
        if($result === TRUE){
            $txt = "<div class='alert alert-success'>Successfully Deleted!</div>";
            return $txt;
        }
    }

    // View Order From Admin Panel
    public function viewOrderadmin(){       
        $qry = "SELECT * FROM order_table 
        INNER JOIN product_table ON order_table.product_id = product_table.id 
        INNER JOIN user_table ON order_table.mobile_no = user_table.mobile  
        ORDER by status ASC";
        $result = $this->conn->query($qry);
        return $result;
    }

    // Buy Product
    public function buyProduct($data,$product_id,$mobile){
        $product_price = mysqli_real_escape_string($this->conn, $data['product_price']);
        $product_discount = mysqli_real_escape_string($this->conn, $data['product_discount']);

        $que = $this->conn->query("SELECT * FROM order_table WHERE product_id=$product_id AND status=0 AND mobile_no=$mobile");
        $value = mysqli_fetch_array($que);
        if ($value > 0) {
            $txt = "<div class='alert alert-danger'>Already added!</div>";
            return $txt;
        }else{
            $qry = "INSERT INTO order_table(mobile_no,product_id,product_price,product_discount)VALUES('$mobile','$product_id','$product_price','$product_discount')";
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

       // View Order
       public function viewOrder(){
        $mobile = $_SESSION['mobile'];
        $qry = "SELECT * FROM order_table 
        INNER JOIN user_table ON order_table.mobile_no = user_table.mobile 
        INNER JOIN product_table ON order_table.product_id = product_table.id 
        where order_table.mobile_no = '$mobile'";
        $result = $this->conn->query($qry);
        return $result;
    }

}

?>