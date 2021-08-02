<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
        header('Location:login.php');
      }
    $email = $_SESSION['email'];
?>

<?php
    if(isset($_POST['submit']) && isset($_FILES['show_img'])){
        $show_name = $_POST['show_name'];
        $category = $_POST['category'];
        $channel = $_POST['channel'];
        $day = $_POST['day'];
        $time = $_POST['time'];
        $schedule = $_POST['schedule'];
        $test = 0;

        if(!(preg_match("/^[a-z ,.'-]+$/i",$show_name))){
            $error_show = "Invalid Format of show name <br>";
            $test = 1;
        }
        if(!(preg_match("/^[a-z ,.'-]+$/i",$category))){
            $error_category = "Invalid Format of show category <br>";
            $test = 1;
        }
        if(!(preg_match("/^[a-z ,.'-]+$/i",$channel))){
            $error_channel = "Invalid Format of channel name <br>";
            $test = 1;
        }
        if(!(preg_match("/^[a-z ,.'-]+$/i",$day))){
            $error_day = "Invalid Format of day <br>";
            $test = 1;
        }

                
                $img_name = $_FILES['show_img']['name'];
                $img_size = $_FILES['show_img']['size'];
                $img_temp = $_FILES['show_img']['tmp_name'];
                $error = $_FILES['show_img']['error'];

                if($error === 0){
                    if($img_size > 25000000){
                        $error_msg = " Image file size should be less than 24MB!";
                        $test = 1;
                    }else{
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
                        $allowed_exs = array("png","jpg","jpeg");

                        if(in_array($img_ex_lc,$allowed_exs)){
                            $new_img_name = uniqid("show-", true).'.'.$img_ex_lc;
                            $img_upload_path = 'show/' . $new_img_name;
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
            $sql = "INSERT into tvshows (show_name, channel, time, day, schedule, category, show_img) values ('$show_name', '$channel', '$time', '$day', '$schedule', '$category', '$new_img_name')";
            $result = mysqli_query($conn,$sql);
            if($result){
                header('Location: admin.php');
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
            <h1 class="mb-5 font-weight-light text-uppercase">Add Show</h1>
            
            <div class="form-group" style="padding: 10px;">
                <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Show Name" name="show_name">
            </div>
            <h6 style="color: red;"><?php if(isset($error_show)) echo $error_show; ?></h6>

            <div class="form-group" style="padding: 10px;">
                <input type="file" class="form-control rounded-pill form-control-lg" placeholder="Cover Image" name="show_img">
            </div>
            <h6 style="color: red;"><?php if(isset($error_msg)) echo $error_msg; ?></h6>

            <div class="form-group" style="padding: 10px;">
                <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Show Category" name="category">
            </div>
            <h6 style="color: red;"><?php if(isset($error_category)) echo $error_category; ?></h6>

            <div class="form-group" style="padding: 10px;">
                <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Channel Name" name="channel">
            </div>
            <h6 style="color: red;"><?php if(isset($error_channel)) echo $error_channel; ?></h6>

            <div class="form-group" style="padding: 10px;">
                <input type="text" class="form-control rounded-pill form-control-lg" name="day" placeholder="Days">
            </div>
            <h6 style="color: red;"><?php if(isset($error_day)) echo $error_day; ?></h6>

            <div class="form-group" style="padding: 10px;">
                <input type="time" class="form-control rounded-pill form-control-lg" placeholder="time" name="time">
            </div>

            <div class="form-group" style="padding: 10px;">
            <select class="form-select rounded-pill form-select-lg" name="schedule">
                <option selected>--Time Schedule--</option>
                <option value="Morning">Morning</option>
                <option value="Noon">Noon</option>
                <option value="Afternoon">Afternoon</option>
                <option value="Evening">Evening</option>
                <option value="Night">Night</option>
            </select>
            </div>
            <button type="submit" name="submit" class="btn mt-5 btn-custom btn-block text-uppercase rounded-pill btn-lg">Add</button>
            
        </form>
    </div>
</body>
</html>