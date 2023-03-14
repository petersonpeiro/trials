<?
@include 'config.php';
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass =md5($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){

            $_SESSION['admin_name'] = $row['admin'];
            header('location:adminpage.php');

        }elseif($row['user_type'] == 'user'){

            $_SESSION['user_name'] = $row['user'];
            header('location:userpage.php');
        }
    }else{

        $error[] = 'incorrect email or password';
      }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- <div class="form-contnent"> -->
            <form action="#" method="post">
                <h3>login here</h3>

                <?php

                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                
                ?>
                
                <input type="email" name="email" placeholder="enter email" required>
                <input type="password" name="password" placeholder="enter password here" required>
                <input type="button" value="submit" name="submit" class="form_btn">
            
            <p>Don't have an account!!! <a href="register.php">Register here</a></p>
              
            </form>  
        <!-- </div> -->
    </div>
</body>
</html>