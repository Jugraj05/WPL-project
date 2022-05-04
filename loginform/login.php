<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    //something was posted
    $name = $_POST['name'];
    $password = $_POST['password'];
    

    if(!empty($name) && !empty($password) && !is_numeric($name))
    {
        //read from database
        $query = "select * from users where name='$name' limit 1";        
        $result = mysqli_query($con, $query);

        if($result){
            if($result && mysqli_num_rows($result) > 0)
            {
            $user_data = mysqli_fetch_assoc($result);
            if($user_data['password'] === $password){
                
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                die;
            }
        }
        }
        echo "Please Enter Correct Username or Password ";

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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    
    
    <div id="box">
        <form method="post">
            <h3>Login</h3>
            <input id="text" type="text" name="name" placeholder="Enter Username"><br><br>
            <input id="text" type="password" name="password" placeholder="Enter Password"><br><br>
            <input id="button" type="submit" value="Login"><br><br>

            <a href="signup.php">Click to Signup</a><br><br>
    </form>
    </div>
</body>
</html>