<?php
include 'layouts/header.php';

if (isset($_GET['package_id'])) {
  $package_id = $_GET['package_id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $addPack = $login->updateProfile($_POST, $_FILES, $_SESSION['user_id']);
}

?>

<!-- Home -->

<div class="home">
	<div class="background_image" style="background-image:url(images/about_page.jpg)"></div>
	<div class="overlay"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title"><span>GymPLANET</span> Profile</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

  <div class="about">
		<div class="container about_container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="about_content">
						<div class="section_title_container">
							<div class="section_title mb-3">Edit Profile</span></div>
						</div>
            
            <?php
            $view = $login->checkprofile();
            foreach ($view as $value) {
            ?>
            <form method="POST" enctype="multipart/form-data">
              <div>
                <?php
                if (isset($addPack)) {
                  echo "<span style='color:red;'>" . $addPack . "</span>";
                }
                ?>
              </div>
              <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" value="<?php echo $value['first_name']; ?>" class="form-control" />
              </div>
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" value="<?php echo $value['last_name']; ?>" class="form-control" />
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" value="<?php echo $value['password']; ?>" class="form-control" />
              </div>
              <div class="form-group">
                <label>Mobile No</label>
              </div>
              <div class="input-group mb-3">

                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">+8801</span>
                </div>
                <input type="number" min=0 class="form-control" placeholder="" value="<?php echo substr($value['mobile'], 5); ?>" name="mobile" aria-describedby="basic-addon1">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" />
                <br>
                <img style="height: 200px; width:200px;" src="<?php echo $value['image']; ?>" alt="">
              </div>



              <br>

              <div class="form-group">
                <button type="submit" class="button extra_button">Confirm</button>
              </div>

              <?php } ?>
            </form>
          </div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'layouts/footer.php'; ?>