<?php include 'layouts/header.php';
 if (isset($_GET['packid'])) {
    $packid = $_GET['packid'];
 }else{
     echo "<script> window.location='all_package.php'</script>";
 }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $createPackage = $pack->createnewcustomer($_POST,$_FILES,$packid);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Admite new Customer</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">customer</li>
      <li class="breadcrumb-item active" aria-current="page">admit</li>
    </ol>
  </div>

  <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Admite new Customer</h6>
        </div>
        <?php if (isset($createPackage)){
                    echo $createPackage;
        }  ?>
        <div class="card-body">
          <form method="POST" action="" enctype="multipart/form-data">
        <p>Total price:
          <?php
            $pack = $pack->viewSinglePackage($packid);
            $data = mysqli_fetch_assoc($pack);
            $price= $data['price'];
            $discount= $data['discount'];
           echo $total = $price-(($price*$discount)/100);
          ?>  Taka</p>
            <div class="form-group">
              <label>First Name</label>
              <input name="first_name" type="text" class="form-control" placeholder="Enter package">
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input name="last_name" type="text" class="form-control" placeholder="Enter package">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input name="email" type="text" class="form-control" placeholder="Enter package">
            </div>
            <div class="form-group">
              <label>DOB</label>
              <input name="dob" type="date" class="form-control" placeholder="Enter package">
            </div>
            <div class="form-group">
              <label>Gender</label><br>
              <input checked name="gender" type="radio" value="male" >Male
              <input name="gender" type="radio" value="female" >Female
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">+8801</span>
              </div>
              <input type="number" min=0 class="form-control" placeholder="" name="mobile" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Package Description"></textarea>
            </div>
            <div class="form-group">
              <label>Image</label>
              <input name="image" type="file" class="form-control" placeholder="Enter month" min="3">
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