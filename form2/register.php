<?php

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
    <title>Register page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- <div class="form-contnent"> -->
            <form action="#" method="post">
                <h3>register here</h3>

                <?php

                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                
                ?>
                
                <input type="text" name="name" placeholder="enter full name" required>
                <input type="email" name="email" placeholder="enter email" required>
                <input type="password" name="password" placeholder="enter password here" required>
                <input type="password" name="cpassword" placeholder="confirm password" required>
                <select name="user-type" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <input type="button" value="submit" name="submit" class="form_btn">
                
            
            <p>Already have an account!!! <a href="login.php">Login here</a></p>
             
            </form>   
        <!-- </div> -->
    </div>
</body>
</html>