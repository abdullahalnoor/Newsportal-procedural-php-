<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>LOGIN</title>

        <!-- Bootstrap core CSS -->
         <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
         <link href="css/signin.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>

    <body>

        <div class="container">

            <form class="form-signin" action="" method="POST">
                <h2 class="form-signin-heading">Please sign in</h2>
                <label class="sr-only">Use Name</label>
                <input type="text" class="form-control" placeholder="User Name" name="user_name" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                $connect = mysqli_connect("localhost", "root", "", "newspaper");
                if(!$connect){
                    die("database failed".mysqli_connect_error());
                }
                $user = $_POST['user_name'];
                $password =  $_POST['password'];
                $query = "SELECT * FROM admin WHERE user_name='$user' AND password='$password'";
                $result = mysqli_query($connect, $query);
               
                $data = mysqli_fetch_array($result);
                if(mysqli_num_rows($result) =="1"){
                    $_SESSION['name'] = $data['user_name'];
                    $_SESSION['id'] = "1";
                    header("Location:news.php");
                }else{
                    echo "try again";
                }
            }
            ?>
        </div> <!-- /container -->
    </body>
</html>
