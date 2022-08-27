<?php
include 'layouts/header.php';
include 'layouts/nav.php';

// include "Classes/LoginClass.php";
if (isset($_GET['link'])) {
  $link = $_GET['link'];
} else {
  $link = 'index.php';
}
$login = new LoginClass();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $logincheck = $login->userLogin($email, $password);
}
?>

<!-- Home -->

<div class="home">
  <div class="background_image" style="background-image:url(images/services.jpg)"></div>
  <div class="overlay"></div>
  <div class="home_container">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="home_content">
            <div class="home_title">Login Your Gym Planet Account</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container" style="padding: 90px;">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="login col-md-8">
      <form method="POST" action="">
        <?php if (isset($logincheck)) {
          echo $logincheck;
        } ?>
        <div class="form-group">
          <label for="inputEmail4">Email Address</label>
          <input type="text" name="email" class="form-control" id="inputEmail4" placeholder="Enter Your Email">
        </div>
        <div class="form-group">
          <label for="inputPassword4">Password</label>
          <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Enter Password">
        </div>
        <div style="padding: 20px;">
          <button name="user_id" type="submit" class="btn btn-primary">Log in</button>
          <button class="btn btn-info"><a href="register.php" style="color: white;">Register</a></button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include 'layouts/footer.php'; ?>