<?php include 'layouts/header.php';
 
$foodid = "";
if($_GET['foodid']==NULL || !isset($_GET['foodid'])){
	"<script>window.location = 'food.php'; </script>"; 
}else{
	$foodid = $_GET['foodid'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $updatePackage = $food->updateFood($_POST,$foodid);
}
?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Package</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Food</li>
        <li class="breadcrumb-item active" aria-current="page">Create Food</li>
      
    </ol>
    
    </div>
<a class="btn btn-success" href="food.php">Food Menu</a>

  <div class="row">
      <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <!-- Form Basic -->
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Edit Package</h6>
        </div>
        <?php
            if(isset($updatePackage)){
                echo $updatePackage;
            }
        ?>
        <div class="card-body">
          <form method="POST">
            <?php 
                $view = $food->viewSingleFood($foodid);
                if($view){
                    while($value = $view->fetch_assoc()){
            ?>
     
            <div class="form-group">
              <label>menu</label>
              <textarea name="menu" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $value['menu'];?></textarea>
            </div>
            <div class="form-group">
              <label>Month</label>
           <input name="age_limit"  class="form-control" type="text" value="<?php echo $value['age_limit'];?>">
            </div>
            
            <?php }} ?>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!---Container Fluid-->
<?php include 'layouts/footer.php';?>