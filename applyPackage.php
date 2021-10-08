<?php 
include 'layouts/header.php';
include 'layouts/nav.php';
if (isset($_GET['package_id'])) {
    $package_id = $_GET['package_id'];
}
if ($_SESSION['loginauth']!='user') {
    header("Location:login.php?lastlink=$link");
}
if ($_SERVER['REQUEST_METHOD'] =='POST') {
    $addPack = $pack->ApplyPack($_POST,$_GET['package_id'],$_SESSION['mobile']);
}
?>
<div class="container" style="padding-top: 100px;">
  	<h4 class="text-center">Package</h4>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php 
                if(isset($addPack)){
                    echo $addPack;
                }
                $viewpack = $pack->ShowSelectedpack($package_id);
                foreach($viewpack as $value){
            ?>
            <form method="POST">
                <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" value="<?php echo $value['package_id']; ?>">
                <input type="hidden" readonly value="<?php echo $value['details'];?>" class="form-control" />

                <div class="form-group">
                    <label>Package Name</label>
                    <input type="text" readonly value="<?php echo $value['pack_name'];?>" class="form-control" />
                </div>
                <div class="form-group">
                    <input name="pack_month" type="hidden" readonly value="<?php echo $value['month'];?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input name="pack_price" type="text" readonly value="<?php echo $value['price'];?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Discount</label>
                    <input name="pack_discount" type="text" readonly value="<?php echo $value['discount'];?>" class="form-control" />
                </div>
                <div class="form-group">
              <label>Instructor</label>
             <select name="trainer" id="" class="form-control">
             <option value="" disabled >Choose</option>
               <?php
               $data = $emp->trainer();
               foreach ($data as $key => $value) {
             
               ?> 
               
               <option value="<?php echo $value['emp_id'];?>"><?php
                echo $value['emp_name']; 
               ?>
            
            
            
            </option>
               <?php } ?>
             </select>
            </div>
                <button type="submit" class="btn btn-primary btn-block mb-4">Buy</button>
                <?php } ?>
            </form>
        </div>
    </div>  
</div> 
<?php include 'layouts/footer.php';?>