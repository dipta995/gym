<?php
include 'layouts/header.php';
include 'layouts/nav.php';
?>

<div class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section_title_container">
                    <div class="section_title" style="text-align:center;">Our Products</div>
                </div>
                <hr><br>
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <?php
                    $view = $product->viewProduct();
                    foreach ($view as $value) {
                    ?>
                        <div class="col" style=" max-width: 18rem; min-width: 18rem; margin-bottom: 10px;">
                            <div class="card h-100">
                                <img src="admin/<?php echo $value['image']; ?>" class="card-img-top" alt="">
                                <div class="card-body" style="text-align:center;">
                                    <h6 class="card-title"><?php echo $value['name']; ?></h6>
                                    <h4 class="card-title"><?php echo $value['selling_price']; ?> BDT</h4>
                                    <h4 class="card-title"><?php echo $value['discount']; ?> (%) Discount </h4>
                                    <p class="card-text"><?php echo $value['description']; ?></p>
                                </div>
                                <a href="buyProduct.php?product_id=<?php echo $value['id'] ?>" class="btn btn-info">Buy Now</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layouts/footer.php'; ?>