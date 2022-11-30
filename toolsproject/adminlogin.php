<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="adlogin.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="adhome.php" method="POST" autocomplete="">
                    <h1 class="text-center">Admin</h1>
                    <p class="text-center">Login with your email and password.</p>
                   <?php
                    if(isset($_POST['send']) && !empty($_POSt['admin_id'])&& !empty($_POSt['email'])&& !empty($_POSt['password'])){
                        if(($_POST['admin_id']=='admin01') && ($_POST['email']=='admin@gmail.com') && ($_POST['password']=='admin01')){
                            header("location: adhome.php");
                        }
                        else{
                            echo "<script>alert('Failure'!);window.location.href='index.php';</script>";
                        }
                    }
                    ?> 
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <!-- <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div> -->
                    <div class="form-group" >
                        <input  class="form-control button"  type="submit" name="login" value="Login"> 
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

