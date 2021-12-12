<?php 
include 'layouts/header.php';
include 'layouts/nav.php';
if (isset($_GET['package_id'])) {
    $package_id = $_GET['package_id'];
}
if ($_SESSION['loginauth']!='user') {
    header("Location:login.php");
}
if ($_SERVER['REQUEST_METHOD'] =='POST') {
    $addPack = $login->updateProfile($_POST,$_FILES,$_SESSION['user_id']);
}
?>
<div class="container" style="padding-top: 100px;">
  	<h4 class="text-center">Package</h4>
    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8">
            <?php 
               
                $view = $login->checkprofile();
                foreach($view as $value){ 
            ?>
            <form method="POST" enctype="multipart/form-data">
 <div>
              <?php
               if(isset($addPack)){
                echo "<span style='color:red;'>".$addPack."</span>";
            }
              ?>
</div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name"  value="<?php echo $value['first_name'];?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name"  value="<?php echo $value['last_name'];?>" class="form-control" />
                </div>
                 <!-- <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email"  value="<?php echo $value['email'];?>" class="form-control" />
                </div> -->
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password"  value="<?php echo $value['password'];?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Mobile No</label>
                </div>
                <div class="input-group mb-3">
 
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">+8801</span>
                      </div>
                      <input type="number" min=0 class="form-control" placeholder="" value="<?php echo substr($value['mobile'],5);?>" name="mobile" aria-describedby="basic-addon1">
                    </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image"  class="form-control" />
                    <br>
                    <img style="height: 200px; width:200px;" src="<?php echo $value['image']; ?>" alt="">
                </div>
               
            
               
			<br>
		 
			<div class="form-group">
                      <button style="float:left;" type="submit" class="btn btn-primary btn-block">Confirm</button>
                    </div>
               
                <?php } ?>
            </form>
        </div>
    </div>  
<style>
* {
  box-sizing: border-box;
}

.columns {
  float: left;
  width: 33.3%;
  padding: 8px;
}

.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
}

.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

.price .grey {
  background-color: #eee;
  font-size: 20px;
}

.button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}
</style>
</div> 

<?php include 'layouts/footer.php';?>