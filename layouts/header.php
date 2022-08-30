<?php
session_start();
include 'Classes/PackageClass.php';
include 'Classes/LoginClass.php';
include 'Classes/EmployeeClass.php';
include 'Classes/ContactClass.php';
include 'Classes/ProductClass.php';
include 'Classes/CartClass.php';
$cart = new CartClass();
$cont = new ContactClass();
$pack = new PackageClass();
$login = new LoginClass();
$emp = new EmployeeClass();
$product = new ProductClass();
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
<link rel="stylesheet" type="text/css" href="styles/profile.css">
<link rel="stylesheet" type="text/css" href="styles/about_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/profile_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/services.css">
<link rel="stylesheet" type="text/css" href="styles/services_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

