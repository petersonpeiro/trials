<?php
// @include 'config.php';

// if(isset($_POST['submit'])){
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $pass = md5($_POST['password']);
//     $cpass = md5($_POST['password']);
//     $user_type = $_POST['user_type'];

//     $select = "select * FROM user_form WHERE email = '$email' && password = '$pass'";

//     $result = mysqli_query($conn, $select);

//     if(mysqli_num_rows($result) > 0){
//         $error[] = 'email or personal exists';
//     }else{
//     if($pass != $cpass){
//         $error[] = 'passwords not matched';
//     }else{
//         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES ('$name', '$email', '$pass', '$user_type')";
//         mysqli_query($conn, $insert);
//         header('location: loginpage.php');
//     }
//   }
// };



@include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $error[] = 'user already exist!';

    }else{
        if($pass != $cpass){
            $error[] = 'password not matched!'; 
        }else{
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name', '$email', '$pass', '$user_type')";
            mysqli_query($conn, $insert);
            header('location:loginpage.php');
        }
    }

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regiters page</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div class="form_container">
    <form action="" method="post">
    <h3>register here</h3>
    <?php
if(isset($error)){
    foreach($error as $error){
        echo '<span class="error-msg">'.$error.'</span>';
    };
};

    ?>
    <input type="text" name="name" required placeholder="enter your name">
    <input type="email" name="email" required placeholder="enter your email">
    <input type="password" name="password" required placeholder="enter your password">
    <input type="password" name="cpassword" required placeholder="confirm your password">
    <select name="user_type" >
    <option value="user">user</option>
    <option value="admin">admin</option>
    </select>
    <input type="submit" value="register now" name="submit" class="form_btn">
    <p>Already have an account... <a href="loginpage.php">Login here</a></p>
    </form>
    </div>
</body>
</html>