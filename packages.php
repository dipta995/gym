<?php
include 'layouts/header.php';
include 'layouts/nav.php';
?>

<!-- Services -->

<div class="services">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title_container">
                    <div class="section_title" style="text-align:center;">Our Packages</div>
                </div>
                <hr>
                <br>
                <?php
                $viewpack = $pack->viewPackage();
                foreach ($viewpack as $value) {
                ?>
                    <div id="services" class="columns">
                        <ul class="price">
                            <li class="price_header"><?php echo $value['pack_name']; ?></li>
                            <li class="grey"><?php echo $value['price']; ?> BDT / <?php echo $value['month']; ?> Months</li>
                            <li><?php echo $value['discount']; ?>(%) Discount</li>
                            <li><?php echo $value['details']; ?></li>
                            <li class="grey"><a href="applyPackage.php?package_id=<?php echo $value['package_id'] ?>" class="button">Buy Now</a></li>
                        </ul>
                        <br>
                    </div>
                <?php } ?>

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

                    .price_header {
                        background-color: #111;
                        color: white;
                        font-size: 25px;
                    }

                    .price li {
                        border-bottom: 1px solid #eee;
                        padding: 20px;
                        text-align: center;
                        font-size: large;
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
        </div>
    </div>
</div>
<?php include 'layouts/footer.php'; ?>