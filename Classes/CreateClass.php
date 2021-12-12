<?php 
include_once 'db.php';
class CreateClass extends DB
{
    public $db;
    public function __construct()
    {
        $conn = $this->connect();
    }
    public function createadmin()
    {
        $sql = "CREATE TABLE `admin_table` (
            `admin_id` int(20) NOT NULL AUTO_INCREMENT,
            `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`admin_id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
           $r = $this->conn->query($sql);
           if($r){
               echo "Admin table created";
           }

    }
    public function createemployee()
    {
        $sql = "CREATE TABLE `employee_table` (
            `emp_id` int(11) NOT NULL AUTO_INCREMENT,
            `emp_name` varchar(200) NOT NULL,
            `emp_job_status` varchar(200) NOT NULL,
            `emp_email` varchar(200) NOT NULL,
            `emp_phone` varchar(200) NOT NULL,
            `emp_image` varchar(200) NOT NULL,
            `emp_salary` varchar(200) NOT NULL,
            `create_emp` timestamp NOT NULL DEFAULT current_timestamp(),
            `emp_address` text NOT NULL,
            PRIMARY KEY (`emp_id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4";
           $r = $this->conn->query($sql);
           if($r){
               echo "Employee table created";
           }

    }
    public function createfood()
    {
        $sql = "CREATE TABLE `food_table` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `age_limit` varchar(150) NOT NULL,
            `menu` longtext NOT NULL,
            PRIMARY KEY (`id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4";
           $r = $this->conn->query($sql);
           if($r){
               echo "Food table created";
           }

    }
    public function createorder()
    {
        $sql = "CREATE TABLE `order_table` (
            `order_id` int(11) NOT NULL AUTO_INCREMENT,
            `mobile_no` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
            `pack_id` int(11) NOT NULL,
            `pack_price` int(11) NOT NULL,
            `pack_month` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
            `pack_discount` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
            `status` int(11) NOT NULL DEFAULT 0,
            `created_at` date NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`order_id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
           $r = $this->conn->query($sql);
           if($r){
               echo "Order table created";
           }

    }
    public function createpackage()
    {
        $sql = "CREATE TABLE `package_table` (
            `package_id` int(20) NOT NULL AUTO_INCREMENT,
            `pack_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
            `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `price` int(25) NOT NULL,
            `discount` int(25) NOT NULL,
            `del_pack` tinyint(10) NOT NULL DEFAULT 0,
            `trainer` int(11) NOT NULL,
            PRIMARY KEY (`package_id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
           $r = $this->conn->query($sql);
           if($r){
               echo "Package table created";
           }

    }
    public function createsalary()
    {
        $sql = "CREATE TABLE `salary_table` (
            `salary_id` int(11) NOT NULL AUTO_INCREMENT,
            `emp_id` int(11) NOT NULL,
            `month` varchar(200) NOT NULL,
            `salary` varchar(200) NOT NULL,
            `year` int(11) NOT NULL,
            `pay_at` timestamp NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`salary_id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4";
           $r = $this->conn->query($sql);
           if($r){
               echo "Salary table created";
           }

    }
    public function createuser()
    {
        $sql = "CREATE TABLE `user_table` (
            `user_id` int(20) NOT NULL AUTO_INCREMENT,
            `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `image` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
            `flag` tinyint(10) NOT NULL DEFAULT 0,
            `reg_at` timestamp NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`user_id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
           $r = $this->conn->query($sql);
           if($r){
               echo "User table created";
           }

    }
}