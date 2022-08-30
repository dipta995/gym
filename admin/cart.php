<?php
include 'layouts/header.php';

if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['add_to_cart'])) {
    $addCart = $cart->insertCart($_POST);
}

if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['quantityUp'])) {
    $addCart = $cart->UpdateCart($_POST);
}

if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['send_to_order'])) {
    $addOrder = $cart->insertOrder($_POST);
}

?>

<?php
if (isset($_GET['delCart'])) {
    $delCart = $_GET['delCart'];
    $delete = $cart->deleteCart($delCart);
    echo $delete;
    echo "<script>window.location='cart.php'</script>";
}
?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cart</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0 font-weight-bold text-primary">Products</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            <?php
                            $i = 0;
                            $view = $product->viewProduct();
                            foreach ($view as $value) {
                                $i++;
                            ?>
                                <div class="col" style="max-width: 12rem; min-width: 12rem; margin-bottom: 10px;">
                                    <div class="card h-100">
                                        <img src="<?php echo $value['image']; ?>" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $value['name']; ?></h5>
                                            <h6 class="card-title"><?php echo $value['selling_price']; ?> BDT</h6>

                                            <form method="POST">
                                                <input type="hidden" name="product_id" value="<?php echo $value['id']; ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <button name="add_to_cart" type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0 font-weight-bold text-primary">Cart Items</h4>
                </div>
                <?php
                if (isset($addCart)) {
                    echo $addCart;
                }
                ?>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            $total = 0;
                            $total_discount = 0;
                            $view = $cart->viewCart();
                            if ($view->num_rows > 0) {
                                foreach ($view as $value) {
                                    $price_disc = ($value['selling_price'] * $value['discount']);
                                    $discount = ($value['discount'] / 100) * ($value['selling_price'] * $value['quantity']);
                            ?>
                                    <tr>
                                        <td><?php echo $i += 1; ?></td>
                                        <td><?php echo $value['name']; ?></td>
                                        <td>
                                            <form action="" method="POST">
                                                <input type="hidden" name="cart_id" value="<?php echo $value['cartid']; ?>">
                                                <input type="number" name="quantity" min="1" max="<?php echo $cart->QuantityCheck($value['id']); ?>" value="<?php echo $value['quantity']; ?>">
                                                <button name="quantityUp" class="btn btn-info btn-sm">Update</button>
                                            </form>
                                        </td>
                                        <td><?php echo $subtotal = ($value['selling_price'] - ($price_disc / 100)) * $value['quantity']; ?></td>
                                        <td>
                                            <a onclick="return confirm('Are you sure to Delete?');" href="?delCart=<?php echo $value['cartid']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>

                            <?php
                                    $total_discount += $discount;
                                    $total += $subtotal;
                                }
                            } ?>
                        </tbody>

                    </table>
                    <hr>

                    <table class="table align-items-center table-flush">
                        <tbody>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Customer Name</label><br>
                                    <select id="select" required name="user_id" class="form-control">
                                        <option value="">Select Customer</option>
                                        <?php
                                        $query = "select * from user_table";
                                        $cusid = $cart->select($query);
                                        if ($cusid) {
                                            while ($result = $cusid->fetch_assoc()) {
                                        ?>
                                                <option value="<?php echo $result['user_id']; ?>">
                                                    <?php echo $result['first_name'] . " " . $result['last_name']; ?>
                                                </option>

                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <hr>
                                <div>
                                    <label>Discount</label>
                                    <span style="float:right">
                                        <?php echo $total_discount; ?> BDT
                                    </span>
                                </div>
                                <hr>

                                <div>
                                    <label>Total Payment</label>
                                    <span style="float:right">
                                        <?php echo $total; ?> BDT
                                    </span>
                                </div>
                                <hr>

                                <button name="send_to_order" type="submit" class="btn btn-success float-right">Confirm</button>
                            </form>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<!---Container Fluid-->
<?php include 'layouts/footer.php'; ?>