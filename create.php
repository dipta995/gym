<?php
include 'Classes/CreateClass.php';
$c= new CreateClass();
echo $c->createadmin();
echo "<br>";
echo $c->createemployee();
echo "<br>";
echo $c->createfood();
echo "<br>";
echo $c->createorder();
echo "<br>";
echo $c->createpackage();
echo "<br>";
echo $c->createsalary();
echo "<br>";
echo $c->createuser();
echo "<br>";
?>