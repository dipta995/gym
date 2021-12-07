<?php include 'layouts/header.php';
 
$create = new LoginClass();
if(isset($_GET['link'])){
  $link = $_GET['link'];
}else{
  $link = 'index.php';
}
$login = new LoginClass();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $logincheck = $login->userLogin($email,$password, $link);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
  $createUser = $create->insertUser($_POST,$_FILES);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>GYM - Register</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create Account</h1>
                  </div>
                  <?php
                    if(isset($createUser)){
                      echo $createUser;
                    }
                  ?>
                  <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>First Name</label>
                      <input name="first_name" type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter First Name">
                    </div>
                    <div class="form-group">
                      <label>Last Name</label>
                      <input name="last_name" type="text" class="form-control" id="exampleInputLastName" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input name="email" type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                      <label>DOB</label>
                      <input name="dob" type="date" class="form-control" id="exampleInputPassword">
                    </div>
                    <div class="form-group">
                      <label>Gender</label>
                      <input type="radio" checked name="gender" value="male">Male
                      <input type="radio" name="gender" value="female">Female
                    </div>
                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">+8801</span>
                      </div>
                      <input type="number" min=0 class="form-control" placeholder="" name="mobile" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                      <label>Parmanent Address</label>
                      <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Address"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input name="image" type="file" class="form-control" id="exampleInputPassword" >
                    </div>
                    <div class="form-group">
                      <button type="submit" name="create" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <hr>
                  </form>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Already have an account?</h1> 
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
                          <button name="user" type="submit" class="btn btn-success">Log in</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>
<?php include 'layouts/footer.php';?>