<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    //something was posted
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    if(!empty($name) && !empty($password) && !empty($email) && !empty($mobile))
    {
        $user_id = random_num(20);
        $query = "insert into users (user_id,name,password,email,mobile,address) values ('$user_id','$name','$password','$email','$mobile','$address')";
        
        mysqli_query($con, $query);
        header("Loaction: login.php");

    }
    else{
        echo "Please Enter Valid Information";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    
    
    <div id="box">
        <form method="post">
            <h3>Signup</h3>
            <input id="text" type="text" name="name" placeholder="Enter Username"><br><br>
            <input id="text" type="password" name="password" placeholder="Enter Password"><br><br>
            <input id="text" type="email" name="email" placeholder="Enter Email ID"><br><br>
            <input id="text" type="text" name="mobile" placeholder="Enter Mobile Number"><br><br>
            <input id="text" type="text" name="address" placeholder="Enter House Address"><br><br>
            <input id="button" type="submit" value="Signup"><br><br>

            <a href="login.php">Click to Login</a><br><br>
    </form>
    </div>
</body>
</html>