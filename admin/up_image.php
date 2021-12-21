<?php include 'layouts/header.php';
 if (!isset($_GET['imageid']) || empty($_GET['imageid'])) {
    "<script>window.location = 'employee_list.php'; </script>"; 
 }else{
     $imageid = $_GET['imageid'];
 }
 
 $view = $emp->viewImageid($imageid);
 
     $value = mysqli_fetch_array($view);
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $createPackage = $emp->updateImage($_POST,$_FILES,$imageid);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Employee</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Employee</li>
      <li class="breadcrumb-item active" aria-current="page">Update Employee</li>
    </ol>
  </div>

  <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Update Employee</h6>
        </div>
        <?php if (isset($createPackage)){
                    echo $createPackage;
        }  ?>
        <div class="card-body" >
          <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label>Caption One</label>
              <input required name="caption" value="<?php echo $value['caption']; ?>" type="text" class="form-control" >
            </div>
            <div class="form-group">
              <label>Caption Two</label>
              <input required name="caption_two" value="<?php echo $value['caption_two']; ?>" type="text" class="form-control" >
            </div>
            <div class="form-group">
              <label>Short Brif</label>
              <textarea required name="brif" class="form-control" ><?php echo $value['brif']; ?></textarea>
            </div>
            <div class="form-group">
              <label>Image</label>
              <input name="image" type="file" class="form-control">
            </div>
            <div>
              <img style="height:100px; width:100px;" src="<?php echo $value['image_link']; ?>" >
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
 
<?php include 'layouts/footer.php';?>