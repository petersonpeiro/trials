<?php 

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:loginpage.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
</head>
<body>
    <p>welcome admin <span><?php echo $_SESSION['admin_name'] ?></span></p>
    <a href="logout.php"> logout</a>
</body>
</html>