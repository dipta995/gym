<?php include 'layouts/header.php';
 if (isset($_GET['packid'])) {
    $packid = $_GET['packid'];
 }else{
     echo "<script> window.location='all_package.php'</script>";
 }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $createPackage = $pack->confirmbuypackbyadmin($_POST,$packid);
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
      <div class="col-lg-2">
        <a class="btn btn-success" href="createnew.php">Create new Customer</a>
      </div>
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
          <form method="POST" action="">
        <p>Total price:
          <?php
            $pack = $pack->viewSinglePackage($packid);
            $data = mysqli_fetch_assoc($pack);
            $price= $data['price'];
            $discount= $data['discount'];
           echo $total = $price-(($price*$discount)/100);
          ?>  Taka</p>
          <div class="form-group">
              <label>User</label>
             <select name="mobile_no" id="" class="form-control">
             <option value="" disabled >Choose</option>
               <?php
               $data = $emp->alluser();
               foreach ($data as $key => $values) {
             
               ?>
               <option value="<?php echo $values['mobile'];?>"><?php echo $values['first_name'].' '.$values['last_name'].'('.$values['mobile'].')';?></option>
               <?php } ?>
             </select>
            </div>
             <div class="form-group">
              <label>Instructor</label>
             <select name="trainer" id="" class="form-control">
             <option value="" disabled >Choose</option>
               <?php
               $data = $emp->trainer();
               foreach ($data as $key => $value) {
             
               ?>
               <option value="<?php echo $value['emp_id'];?>"><?php echo $value['emp_name'];?></option>
               <?php } ?>
             </select>
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