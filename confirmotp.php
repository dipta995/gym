<?php include 'layouts/header.php';

// include "Classes/LoginClass.php";
 
if(isset($_GET['id'])){
  $id = $_GET['id'];
}else{
    return "<script>window.location='register.php';</script>";
}
$login = new LoginClass();
if (isset($_POST['user'])) {
    $otp = $_POST['otp'];
     
    $logincheck = $login->otpcheck($otp,$id);
}         	
?>
<div class="container" style="padding: 90px;">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="login col-md-8">
      <form method="POST" action="">
        <?php if (isset($logincheck)) {
              echo $logincheck;
          } ?>
          <div class="form-group">
            <label for="inputEmail4">Otp</label>
            <input type="text" name="otp" class="form-control" id="inputEmail4" placeholder="enter otp code">
          </div>
       
          <div style="padding: 20px;">
            <button name="user" type="submit" class="btn btn-primary">Confirm</button>
            <button class="btn btn-info"><a href="register.php" style="color: white;">Register</a></button>
          </div>
      </form>
    </div>
  </div>
</div>
<?php include 'layouts/footer.php';?>