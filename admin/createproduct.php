<?php include 'layouts/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $createProduct = $product->insertProduct($_POST);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item active" aria-current="page">Create Product</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add New Product</h6>
                </div>
                <?php if (isset($createProduct)) {
                    echo $createProduct;
                }  ?>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Product Name">
                        </div>

                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" cols="" rows="3" placeholder="Product Description"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Upload Image</label>
                            <td>
                                <input type="file" name="image" class="form-control" placeholder="Enter Image" min="0" />
                            </td>
                        </div>

                        <div class="form-group">
                            <label>Stock</label>
                            <input name="stock" type="number" class="form-control" placeholder="Product in Stock">
                        </div>

                        <div class="form-group">
                            <label>Buying Price</label>
                            <input name="buying_price" type="number" class="form-control" placeholder="Enter Buying Price">
                        </div>

                        <div class="form-group">
                            <label>Selling Price</label>
                            <input name="selling_price" type="number" class="form-control" placeholder="Enter Selling Price">
                        </div>

                        <div class="form-group">
                            <label>Discount</label>
                            <input name="discount" type="number" class="form-control" placeholder="Enter Discount">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
 
<script type="text/javascript"> 
//<![CDATA[

	CKEDITOR.replace( 'myEditor',
		{
			fullPage : true,
			uiColor : '#efe8ce'
		});
//]]>
</script> -->
<!---Container Fluid-->
<?php include 'layouts/footer.php'; ?>