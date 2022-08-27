<?php
include 'layouts/header.php';
include 'layouts/nav.php';

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
}
if ($_SESSION['loginauth'] != 'user') {
    header("Location:login.php?lastlink=$link");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addProduct = $product->buyProduct($_POST, $_GET['product_id'], $_SESSION['mobile']);
}
?>
<br>

<div class="container" style="padding-top: 100px;">
    <h2 class="text-center">Buy Products</h2>
    <br><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <?php
            if (isset($addPack)) {
                echo $addPack;
            }
            $view = $product->ShowSelectedproduct($product_id);
            $value = mysqli_fetch_array($view);

            ?>
            <form method="POST">
                <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" value="<?php echo $value['id']; ?>">
                <input type="hidden" readonly value="<?php echo $value['description']; ?>" class="form-control" />

                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" readonly value="<?php echo $value['name']; ?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Price <span style="color:red;">BDT</span></label>
                    <input name="selling_price" type="text" readonly value="<?php echo $value['selling_price']; ?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Discount <span style="color:red;">(%)</span></label>
                    <input name="discount" type="text" readonly value="<?php echo $value['discount']; ?>" class="form-control" />
                </div>

                <br>

                <div class="form-group">
                    <button style="float:left;" type="submit" class="btn btn-primary btn-block">Confirm</button>
                </div>
                <br><br>
            </form>
        </div>
        <div class="col-md-4">
            <div style="border: 2px solid black; border-radius: 5px;">
                <div class="blog_post_image"><img src="admin/<?php echo $value['image'] ?>" alt=""></div>
                <h4 style="text-align: center;margin-top: 5px;">Product Details</h4>
                <p style="margin: 10px;"><?php echo $value['description']; ?></p>
            </div>
        </div>
        </div><br><br><br>
        <style>
            * {
                box-sizing: border-box;
            }

            .columns {
                float: left;
                width: 33.3%;
                padding: 8px;
            }

            .price {
                list-style-type: none;
                border: 1px solid #eee;
                margin: 0;
                padding: 0;
                -webkit-transition: 0.3s;
                transition: 0.3s;
            }

            .price:hover {
                box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.2)
            }

            .price .header {
                background-color: #111;
                color: white;
                font-size: 25px;
            }

            .price li {
                border-bottom: 1px solid #eee;
                padding: 20px;
                text-align: center;
            }

            .price .grey {
                background-color: #eee;
                font-size: 20px;
            }

            .button {
                background-color: #04AA6D;
                border: none;
                color: white;
                padding: 10px 25px;
                text-align: center;
                text-decoration: none;
                font-size: 18px;
            }

            @media only screen and (max-width: 600px) {
                .columns {
                    width: 100%;
                }
            }
        </style>
    </div>

    <?php include 'layouts/footer.php'; ?>