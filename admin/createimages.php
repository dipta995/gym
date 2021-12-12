<?php include 'layouts/header.php';
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $createPackage = $emp->createnewgalaryImage($_POST,$_FILES);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Images</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Images</li>
      <li class="breadcrumb-item active" aria-current="page">Create Employee</li>
    </ol>
  </div>
  <a class="btn btn-success" href="images.php">Image List</a>
  <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Add New Image</h6>
        </div>
        <?php if (isset($createPackage)){
                    echo $createPackage;
        }  ?>
        <div class="card-body" >
          <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label>Caption</label>
              <input required name="caption" type="text" class="form-control" >
            </div>
            
            <div class="form-group">
              <label>Image</label>
              <input name="image" type="file" class="form-control">
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'layouts/footer.php';?>