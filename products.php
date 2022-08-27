<?php
include 'layouts/header.php';
include 'layouts/nav.php';
?>

<div class="services">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container">
                    <div class="section_title" style="text-align:center;">Our Products</div>
                </div>
                <hr><br>
                <div class="col-lg-12">
                    <?php
                    $view = $product->viewProduct();
                    foreach ($view as $value) {
                    ?>
                        <!-- Product Post -->
                        <div id="services" class="columns">
                            <ul class="price">
                                <div class="blog_post_image"><img src="admin/<?php echo $value['image'] ?>" alt=""></div>
                                <li class="price_header"><?php echo $value['name']; ?></li>
                                <li class="grey"><?php echo $value['selling_price']; ?> BDT </li>
                                <li class="grey"><?php echo $value['discount']; ?>(%) Discount</li>
                                <li class="grey"><?php echo $value['description']; ?></li>
                                <li class="grey"><a href="buyProduct.php?product_id=<?php echo $value['id'] ?>" class="button">Buy Now</a></li>
                            </ul>
                            <br>
                        </div>
                    <?php } ?>
                </div>

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
                        border: 1px solid #111;
                        margin: 0;
                        padding: 0;
                        -webkit-transition: 0.3s;
                        transition: 0.3s;
                    }

                    .price:hover {
                        box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.2)
                    }

                    .price_header {
                        background-color: #111;
                        color: white;
                        font-size: 25px;
                    }

                    .price li {
                        border-bottom: 1px solid #111;
                        padding: 20px;
                        text-align: center;
                        font-size: large;
                    }

                    .price .grey {
                        background-color: #111;
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
        </div>
    </div>
</div>


<?php include 'layouts/footer.php'; ?>