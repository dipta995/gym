<?php
session_start();
if ($_SESSION['loginauth'] != 'admin') {
  header("Location:login.php");
}

if (isset($_GET['logout']) == 'action') {
  session_destroy();
  header("Location:login.php");
}

include '../Classes/PackageClass.php';
$pack = new PackageClass();
include '../Classes/ProductClass.php';
$product = new ProductClass();
include '../Classes/EmployeeClass.php';
$emp = new EmployeeClass();
include '../Classes/ContactClass.php';
$cont = new ContactClass();
include '../Classes/LoginClass.php';
$create = new LoginClass();
include '../Classes/FormatClass.php';
$fm = new Format();
include '../Classes/CartClass.php';
$cart = new CartClass();
$status = $_SESSION['admin_status'];
$adminid = $_SESSION['admin_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/images.png" rel="icon">
  <title>GYM - Admin</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">
          <h3><b>GYM</b></h3>
        </div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true" aria-controls="collapseTable">
          <i class="fas fa-address-book"></i>
          <span>Admin</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Admin</h6>
            <?php if ($status == 0) { ?>
              <a class="collapse-item" href="createadmin.php">Admin Create</a> 
            <?php } ?>
            <a class="collapse-item" href="admins.php">Admin list</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="cart.php">
          <i class="fas fa-shopping-cart"></i>
          <span>Cart</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable1" aria-expanded="true" aria-controls="collapseTable">
          <i class="fas fa-address-card"></i>
          <span>Employee</span>
        </a>
        <div id="collapseTable1" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Employee </h6>
            <?php if ($status == 0) { ?>
              <a class="collapse-item" href="create_employee.php">Employee Create</a> <?php } ?>
            <a class="collapse-item" href="employee_list.php">Employee list</a>
            <a class="collapse-item" href="salary_list.php">Salary list</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm2" aria-expanded="true" aria-controls="collapseForm">
          <i class="fas fa-shopping-bag"></i>
          <i class="fa-regular fa-bag-shopping"></i>
          <span>Orders</span>
        </a>
        <div id="collapseForm2" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Orders</h6>
            <?php if ($status == 0) { ?>
              <a class="collapse-item" href="order.php">Packages</a>
              <a class="collapse-item" href="product_order.php">Products</a>
              <a class="collapse-item" href="confirmorder.php">Confirm Order</a>
            <?php } ?>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true" aria-controls="collapseForm">
          <i class="fas fa-layer-group"></i>
          <span>Package</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Package</h6>
            <?php if ($status == 0) { ?>
              <a class="collapse-item" href="create_package.php">Create Package</a> <?php } ?>
            <a class="collapse-item" href="all_package.php">All Package</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm1" aria-expanded="true" aria-controls="collapseForm">
          <i class="fab fa-product-hunt"></i>
          <span>Products</span>
        </a>
        <div id="collapseForm1" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Products</h6>
            <?php if ($status == 0) { ?>
              <a class="collapse-item" href="createproduct.php">Create Product</a> <?php } ?>
            <a class="collapse-item" href="product.php">All Products</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="users.php">
          <i class="fas fa-user"></i>
          <span>Users</span>
        </a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="contact.php">
          <i class="fas fa-phone"></i>
          <span>Contact</span>
        </a>
      </li> -->

      <?php if ($status == 0) { ?>
        <li class="nav-item">
          <a target="_blank" class="nav-link" href=" https://dashboard.tawk.to/?lang=en#/chat">
            <i class="fas fa-comments"></i>
            <span>Live Chat</span>
          </a>
        </li>
      <?php } ?>

      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <?php
                if (isset($_GET['logout']) && isset($_GET['logout']) == 'logout') {
                  session_destroy();
                  header('Location:index.php');
                }
                ?>
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo  $_SESSION['admin_email']; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="up_password.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?logout=logout" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->