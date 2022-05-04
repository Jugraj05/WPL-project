<?php
$name = $_POST["name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$comment = $_POST["comment"];

$con=mysqli_connect("localhost","root","","ecom","3308");
$sql = "Insert into contact_us(name, email, mobile, comment) VALUES ('{$name}','{$email}','{$mobile}','{$comment}') ";
$result= mysqli_query($con,$sql) or die("Query failed");
header("location: http://localhost/php/e-commerce/contactusform/contactform.php")

?>