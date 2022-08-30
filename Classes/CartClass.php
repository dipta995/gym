<?php
include_once 'db.php';
class CartClass extends DB
{
    public $db;
    public function __construct()
    {
        $conn = $this->connect();
    }


    public function insertQuery($query)
    {
        $insert = $this->conn->query($query) or die($this->conn->error . __LINE__);
        if ($insert) {
            return $insert;
        } else {
            return false;
        }
    }

    public function QuantityCheck($id)
    {
        $query  = "SELECT * FROM product_table WHERE id = $id";
        $result = $this->conn->query($query);
        $value  = mysqli_fetch_array($result);

        return $value['stock'];
    }


    public function insertCart($data)
    {
        $product_id    = mysqli_real_escape_string($this->conn, $data['product_id']);
        $quantity      = mysqli_real_escape_string($this->conn, $data['quantity']);

        $query  = "SELECT * FROM product_table WHERE id = $product_id";
        $result = $this->conn->query($query);
        $value  = mysqli_fetch_array($result);

        $buying_price  = $value['buying_price'];
        $selling_price = $value['selling_price'];
        $stock         = $value['stock'];
        $discount      = $value['discount'];

        if (empty($product_id) || empty($buying_price) || empty($selling_price) || empty($quantity)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } elseif (($stock - $quantity) < 0) {
            $txt = "<div class='alert alert-danger'>Out of Stock</div>";
            return $txt;
        } else {
            $query = "INSERT into cart_table(product_id, buying_price, selling_price, quantity, discount) values('$product_id', '$buying_price', '$selling_price', '$quantity', '$discount')";
            $result = $this->conn->query($query);

            if ($result) {
                $txt = "<div class='alert alert-success'>Data Inserted Successfully.</div>";
                return $txt;
            }
        }
    }

    public function UpdateCart($data)
    {
        $cart_id = mysqli_real_escape_string($this->conn, $data['cart_id']);
        $quantity = mysqli_real_escape_string($this->conn, $data['quantity']);

        $query = "UPDATE cart_table
        SET 
       
        quantity   = '$quantity'
      
        WHERE id        = '$cart_id'";
        $result = $this->conn->query($query);
        if ($result) {
            $txt = "<div class='alert alert-success'>Successfully updated!</div>";
            return $txt;
        }
    }


    // Insert Order
    public function insertOrder($data)
    {
        $customer_id = mysqli_real_escape_string($this->conn, $data['user_id']);

        $query  = "SELECT * FROM cart_table";
        $result = $this->conn->query($query);

        if (empty($customer_id)) {
            $txt = "<div class='alert alert-danger'>Field must not be empty!</div>";
            return $txt;
        } else {
            foreach ($result as $value) {
                $product_id    = $value['product_id'];
                $buying_price  = $value['buying_price'];
                $selling_price = $value['selling_price'];
                $discount      = $value['discount'];
                $quantity      = $value['quantity'];

                $query = "INSERT into product_order(cus_id, product_id, buying_price, selling_price, quantity, discount) values('$customer_id', '$product_id', '$buying_price', '$selling_price', '$quantity', '$discount')";
                $result = $this->conn->query($query);

                $cartQuery  = "SELECT * FROM product_table WHERE id = $product_id";
                $cartdata = $this->conn->query($cartQuery);
                $provalue = mysqli_fetch_array($cartdata);

                $stock = $provalue['stock'];
                $query = "UPDATE product_table
                SET             
                stock      = $stock - $quantity    
                WHERE id   = '$product_id'";
                $result = $this->conn->query($query);
            }
            if ($result) {
                $delque = "DELETE FROM cart_table where cus_id = 0";
                $delete = $this->conn->query($delque);
                if ($delete) {
                    $txt = "<div class='alert alert-success'>Data Deleted Successfully.</div>";
                    return $txt;
                }
            }
        }
    }




    // View Cart
    public function viewCart()
    {
        $query = "SELECT cart_table.*, user_table.*, product_table.*, cart_table.buying_price AS buying_price, cart_table.selling_price AS selling_price, cart_table.id AS cartid FROM cart_table 
        LEFT JOIN user_table ON cart_table.cus_id = user_table.user_id
        LEFT JOIN product_table ON cart_table.product_id = product_table.id AND cart_table.discount = product_table.discount where cart_table.cus_id = 0";
        $result = $this->conn->query($query);
        return $result;
    }


    public function viewProfit()
    {
        $query = "SELECT SUM(buying_price) AS sum_buyingprice, SUM(selling_price) AS sum_sellingprice, SUM(charge) AS sum_charge FROM tbl_order order by tbl_order.id desc";
        $result = $this->conn->query($query);
        return $result;
    }

    public function viewOrder()
    {
        $query = "SELECT * FROM cart_table";
        $result = $this->conn->query($query);
        return $result;
    }

    // Select or Read data
    public function select($query)
    {
        $result = $this->conn->query($query) or die($this->conn->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function deleteCart($id)
    {
        $cartQuery  = "SELECT * FROM cart_table WHERE id = $id";
        $cartdata = $this->conn->query($cartQuery);
        $value = mysqli_fetch_array($cartdata);
        $quantity = $value['quantity'];
        $cartQuery  = "SELECT * FROM product_table WHERE id = $id";
        $cartdata = $this->conn->query($cartQuery);
        $valueProduct = mysqli_fetch_array($cartdata);
        $stock = $valueProduct['stock'];
        $query = "Delete from cart_table  WHERE id = $id";
        $cartdata = $this->conn->query($query);
        $updatQquery = "UPDATE product_table
        SET
        stock        = $stock+$quantity
        WHERE id     = $id";
        $this->conn->query($updatQquery);

        if ($updatQquery === TRUE) {
            $txt = "<div class='alert alert-success'>Successfully Deleted.</div>";
            return $txt;
        }
    }

    public function selectAllMeasurement($id)
    {
        $query = "SELECT * FROM tbl_measurement WHERE cus_id = '$id'";
        $result = $this->conn->query($query);
        return $result;
    }

    public function deleteOrder($id)
    {
        $query = "UPDATE tbl_order
                SET
                soft_delete      = '1'
                WHERE slip_no    = $id";
        $result = $this->conn->query($query);
        if ($result === TRUE) {
            $txt = "<div class='alert alert-success'>Delivery Successful.</div>";
            return $txt;
        }
    }
}
