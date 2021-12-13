<?php include 'layouts/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $createPackage = $food->insertFood($_POST);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Food Munu</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Food</li>
      <li class="breadcrumb-item active" aria-current="page">Create Food</li>
    </ol>
  </div>
  <a class="btn btn-success" href="food.php"> Food Menu</a>
  <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Add New Food</h6>
        </div>
        <?php if (isset($createPackage)){
                    echo $createPackage;
        }  ?>
        <div class="card-body">
          <form method="POST">
            <div class="form-group">
              <label>Age limit</label>
             
              <input name="age_limit"  class="form-control" type="text" placeholder="16,17,18,...">
            </div>
            <div class="form-group">
              <label>Food Menu</label>
              <textarea name="menu" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Food Menu"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php';?>