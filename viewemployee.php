<?php 
include 'layouts/header.php';
include 'layouts/nav.php';
if (isset($_GET['empid'])) {
    $employeeid = $_GET['empid'];
}
if ($_SESSION['loginauth']!='user') {
    header("Location:login.php?lastlink=$link");
}
 
?>
<div class="container" style="padding-top: 100px;">
  	<h4 class="text-center">Package</h4>
    <div class="row">
        <div class="col-md-6">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
 
 <?php 
  $view = $emp->viewEmployeebyid($employeeid);
  $value = mysqli_fetch_array($view);
 ?>

<!-- <h2 style="text-align:center">User Profile Card</h2> -->
 
<div class="card">
  <img src="admin/<?php echo $value['emp_image']; ?>" alt="John" style="width:100%">
  <h1><?php echo $value['emp_name']; ?></h1>
  <p class="title"><?php echo $value['emp_job_status']; ?></p>
  <p><?php echo $value['emp_email']; ?></p>
  <div style="margin: 24px 0;">
    <!-- <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a>  -->
    <style>
.checked {
  color: orange;
}
</style>
 <?php
 if ($value['total_rat'] ==NULL || $value['hit'] ==NULL) {
    for ($i=0; $i < 5; $i++) { 
        echo '<span style="color:#444;" class="fa fa-star"></span>';
        }
}else{ $count = round($value['total_rat']/$value['hit']);
    for ($i=0; $i < $count; $i++) { 
        echo '<span style="color: orange;" class="fa fa-star checked"></span>';
        }
        for ($i=0; $i < 5- $count; $i++) { 
         echo '<span style="color:#444;" class="fa fa-star"></span>';
        }
}


 
 ?>
 



  </div>
 
</div>
        </div>
        <div class="col-md-6">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <div class="stars">
            <?php 
                if (isset($_POST['empratting'])) {
                 echo  $emp->addratting($_POST,$_SESSION['user_id'],$employeeid);
                }
            ?>
  <form action="" method="post">
    <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
    <label class="star star-1" for="star-1"></label>

    <br>
    <br>
    <input class="btn btn-danger" type="submit" name="empratting" value="Confirm">
  </form>
</div>
<style>div.stars {
  width: 270px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}</style>
            
        </div>
    </div>  
</div> 
<?php include 'layouts/footer.php';?>