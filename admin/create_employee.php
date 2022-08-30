<?php include 'layouts/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $createPackage = $emp->createnewEmployee($_POST, $_FILES);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add New Employee</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Employee</li>
      <li class="breadcrumb-item active" aria-current="page">Create Employee</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Add New Employee</h6>
        </div>
        <?php if (isset($createPackage)) {
          echo $createPackage;
        }  ?>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
              <label>Employee Name</label>
              <input name="emp_name" type="text" class="form-control">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input name="emp_email" type="email" class="form-control" placeholder="Enter email">
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">+8801</span>
              </div>
              <input type="number" min=0 class="form-control" placeholder="" name="emp_phone" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="form-group">
              <label>Job Status</label>
              <select name="emp_job_status" class="form-control">
                <option value="Instructor">Instructor</option>
                <option value="Manager">Manager</option>
                <option value="Cleaner">Cleaner</option>
              </select>
            </div>

            <div class="form-group">
              <label>Salary</label>
              <input name="emp_salary" type="number" class="form-control" placeholder="Enter Salary">
            </div>

            <div class="form-group">
              <label>Image [jpg,jpeg,png,gif]</label>
              <input name="image" type="file" class="form-control">
            </div>

            <div class="form-group">
              <label>Address</label>
              <textarea class="ckeditor form-control" name="emp_address" cols="" rows="3"></textarea>
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