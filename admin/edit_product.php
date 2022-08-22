<?php include 'layouts/header.php';
 
  $productid = "";
  if($_GET['productid']==NULL || !isset($_GET['productid'])){
    "<script>window.location = 'product.php'; </script>"; 
  }else{
    $productid = $_GET['productid'];
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $updateProduct = $product->updateProduct($_POST, $productid);
  }
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Product</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Products</li>
      <li class="breadcrumb-item active" aria-current="page">Update Product</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Update Product</h6>
        </div>
        <?php
          if(isset($updateProduct)){
              echo $updateProduct;
          }
        ?>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <?php 
                $view = $product->viewSingleProduct($productid);
                if($view){
                    while($value = $view->fetch_assoc()){
            ?>

            <div class="form-group">
              <label>Product Name</label>
              <input name="name" type="text" class="form-control" value="<?php echo $value['name'];?>">
            </div>

            <div class="form-group">
              <label>Product Description</label>
              <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $value['description'];?></textarea>
            </div>

            <div class="form-group">
              <label>Upload Image</label>
              <br>
              <td>
                <img src="<?php echo $value['image'];?>" height="100px" width="100px"/></br>
                <input type="file" name="image" class="form-control" placeholder="Enter Image" min="0" />
              </td>
            </div>

            <div class="form-group">
              <label>Buying Price (BDT)</label>
              <input name="buying_price" type="number" class="form-control" value="<?php echo $value['buying_price'];?>" min="0">
            </div>

            <div class="form-group">
              <label>Selling Price (BDT)</label>
              <input name="selling_price" type="number" class="form-control" value="<?php echo $value['selling_price'];?>" min="0">
            </div>

            <div class="form-group">
              <label>Discount (%)</label>
              <input name="discount" type="number" min="0" step="1"  class="form-control" value="<?php echo $value['discount'];?>">
            </div>
 
            <?php } } ?>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php';?>