<?php
    session_start();
    include('db.php');
    if(isset($_SESSION['email'])){
        if($_SESSION['email'] == 'shishir@gmail.com'){
            header('Location:admin.php');
        }else{
            header('Location:profile.php');
        }
    }
?>

<?php
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT *FROM admin where email = '$email'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $row['email'];
            header('Location:admin.php');
        }else{
            $sql = "SELECT * FROM users where email = '$email'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['email'] = $row['email'];
                header('Location:profile.php');
            }
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shows Recommender</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        .login-form{
            max-width: 100%;
            width: 370px;
            padding: 15px;
            margin: auto;
        }
        .login-form a{
            text-decoration: none;
            color: teal;
        }
        .login-form a:hover{
            color: #b1b8c7;
        }
        .form-control{
            font-size: 15px;
            min-height: 48px;
            font-weight: 500;
        }
        .btn-custom{
            background: teal;
            border-color: teal;
            color: #b1b8c7;
            font-size: 15px;
            font-weight: 600;
            min-height: 48px;
        }
    </style>
</head>
<body style="background: #222124; color:#b1b8c7; font: size 14px;">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form action="" class="login-form text-center" method="POST">
            <h1 class="mb-5 font-weight-light text-uppercase">Sign in</h1>
            <div class="form-group" style="padding: 10px;">
                <input type="text" class="form-control rounded-pill form-control-lg" placeholder="User email" name="email">
            </div>
            <div class="form-group" style="padding: 10px;">
                <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" name="password">
            </div>

            <button type="submit" name="submit" class="btn mt-5 btn-custom btn-block text-uppercase rounded-pill btn-lg">Sign in</button>
            <p class="mt-3 font-weight-normal">Don't have an account? <a href="signup.php"><strong>Register Now</strong></a></p>
        </form>
    </div>
</body>
</html>