<?php include 'layouts/header.php';

// include "Classes/LoginClass.php";
 
if(isset($_GET['link'])){
  $link = $_GET['link'];
}else{
  $link = 'index.php';
}
$login = new LoginClass();
if (isset($_POST['user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $logincheck = $login->userLogin($email,$password, $link);
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
            <label for="inputEmail4">Email</label>
            <input type="text" name="email" class="form-control" id="inputEmail4" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="inputPassword4">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
          </div>
          <div style="padding: 20px;">
            <button name="user" type="submit" class="btn btn-primary">Log in</button>
            <button class="btn btn-info"><a href="register.php" style="color: white;">Register</a></button>
          </div>
      </form>
    </div>
  </div>
</div>
<?php include 'layouts/footer.php';?>