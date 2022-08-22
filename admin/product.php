<?php include 'layouts/header.php';
    if(isset($_GET['delProduct'])){
        $delProduct = $_GET['delProduct'];
        $delete = $product->deleteProduct($delProduct);
        echo $delete;	
    }
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Products</li>
        </ol>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Product Table</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Product Image</th>
                                <th>Buying Price</th>
                                <th>Selling Price</th>
                                <th>Discount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            $i = 0;
                            $view = $product->viewProduct();
                            foreach($view as $value){
                                $i++;
                           
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $fm->textShorten($value['description'], 100); ?></td>
                                <td><img src="<?php echo $value['image']; ?>" height="50px" width="50px"/></td>
                                <td><?php echo $value['buying_price']; ?> BDT</td>
                                <td><?php echo $value['selling_price']; ?> BDT</td>
                                <td><?php echo $value['discount']; ?>% <br> <?php echo $value['selling_price']-(($value['selling_price']*$value['discount'])/100) ?>  BDT
                                </td>
                                <td>
                                    <a href="edit_product.php?productid=<?php echo $value['id'] ;?>" class="btn btn-sm btn-info">Edit</a>
                                    <a onclick="return confirm('Are you sure to Delete?');" href="?delProduct=<?php echo $value['id'] ;?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php'; ?>