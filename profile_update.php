<?php
    session_start();
    include('db.php');
    
    if(!isset($_SESSION['email'])){
        header('Location:login.php');
      }
      $email = $_SESSION['email'];
    $email = $_SESSION['email'];
    $user_id = $_SESSION['user_id'];
?>

<?php
    if(isset($_POST['submit']) && isset($_FILES['profile'])){
        $user = $_POST['user_name'];
        $mobile = $_POST['mobile'];
        $test = 0;

        if(!(preg_match("/^[a-z ,.'-]+$/i",$user))){
            $error_user = "Invalid Format of user name <br>";
            $test = 1;
        }

        if(!(preg_match("/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/",$mobile))){
            $error_mob = "Invalid Mobile Number<br>";
            $test = 1;
        }

                
            $img_name = $_FILES['profile']['name'];
            $img_size = $_FILES['profile']['size'];
            $img_temp = $_FILES['profile']['tmp_name'];
            $error = $_FILES['profile']['error'];

            if($error === 0){
                if($img_size > 25000000){
                    $error_msg = " Image file size should be less than 24MB!";
                    $test = 1;
                }else{
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("png","jpg","jpeg");

                    if(in_array($img_ex_lc,$allowed_exs)){
                        $new_img_name = uniqid("profile-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'profile/' . $new_img_name;
                        move_uploaded_file($img_temp, $img_upload_path);
                    }else{
                        $error_msg = "unsupported image type (only png, jpg and jpeg allowed)";
                        $test = 1;
                    }
                }
            }else{
                $error_msg = "error occured while uploading!";
                $test = 1;
            }
        
            if($test == 0){
                $sql = "UPDATE users set (name = '$user', mobile = '$mobile', profile ='$new_img_name') where user_id = '$user_id' and email = '$email'";
                $result = mysqli_query($conn,$sql);
                if($result){
                    $_SESSION['email'] = $email;
                    header('Location: profile.php');
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
        <form action="" class="login-form text-center" method="POST" enctype="multipart/form-data">
            <h1 class="mb-5 font-weight-light text-uppercase">Profile</h1>
            
            <div class="form-group" style="padding: 10px;">
                <input type="text" class="form-control rounded-pill form-control-lg" placeholder="User Name" name="user_name">
            </div>
            <h6 style="color: red;"><?php if(isset($error_user)) echo $error_user; ?></h6>

            <div class="form-group" style="padding: 10px;">
                <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Mobile" name="mobile">
            </div>
            <h6 style="color: red;"><?php if(isset($error_mob)) echo $error_mob; ?></h6>

            <div class="form-group" style="padding: 10px;">
                <input type="file" class="form-control rounded-pill form-control-lg" name="profile" placeholder="Profile">
            </div>
            <h6 style="color: red;"><?php if(isset($error_msg)) echo $error_msg; ?></h6>

            <button type="submit" name="submit" class="btn mt-5 btn-custom btn-block text-uppercase rounded-pill btn-lg">Update</button>
        </form>
    </div>
</body>
</html>