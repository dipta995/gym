<?php
session_start();
include 'Classes/PackageClass.php';
include 'Classes/LoginClass.php';
include 'Classes/EmployeeClass.php';
include 'Classes/ContactClass.php';
$cont = new ContactClass();
$pack = new PackageClass();
$login = new LoginClass();
$emp = new EmployeeClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Gym Planet</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Gym Planet template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/about.css">
<link rel="stylesheet" type="text/css" href="styles/about_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<a href="#">
							<div class="logo d-flex flex-row align-items-center justify-content-start"><img src="images/dot.png" alt=""><div>Gym<span>Planet</span></div></div>
						</a>
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li class="active"><a href="index.php">Home</a></li>
								<li><a href="about.php">About</a></li>
                                <li><a href="applyPackage.php">Packages</a></li>
                                <li><a href="products.php">Products</a></li>
								<li><a href="contact.html">Contact</a></li>
                                <?php
                                if(isset($_GET['logout']) && isset($_GET['logout']) == 'logout'){
                                    session_destroy();
                                    header('Location:index.php');
                                }else if(isset($_SESSION['loginauth']) == 'user'){
                                    ?>
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="?logout=logout">Logout</a></li>
                                <?php }else{ ?>
                                    <li><a href="register.php">Register/ Login</a></li>
                                <?php } ?>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Hamburger -->
	
	<div class="hamburger_bar trans_400 d-flex flex-row align-items-center justify-content-start">
		<div class="hamburger">
			<div class="menu_toggle d-flex flex-row align-items-center justify-content-start">
				<span>menu</span>
				<div class="hamburger_container">
					<div class="menu_hamburger">
						<div class="line_1 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
						<div class="line_2 hamburger_lines" style="visibility: inherit; opacity: 1;"></div>
						<div class="line_3 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Menu -->

	<div class="menu trans_800">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="applyPackage.php">Packages</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="contact.html">Contact</a></li>
                <?php
                if(isset($_GET['logout']) && isset($_GET['logout']) == 'logout'){
                    session_destroy();
                    header('Location:index.php');
                }else if(isset($_SESSION['loginauth']) == 'user'){
                    ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="?logout=logout">Logout</a></li>
                <?php }else{ ?>
                    <li><a href="register.php">Register/ Login</a></li>
                <?php } ?>
			</ul>
		</div>
	</div>