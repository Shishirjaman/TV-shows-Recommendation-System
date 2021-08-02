<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
        header('Location:login.php');
      }
    $email = $_SESSION['email'];
?>

<?php
    if(isset($_POST['submit']) && isset($_GET['myshow_id'])){
        $myshow_id = $_GET['myshow_id'];
        $rate = $_POST['rate'];
        if($rate == "--Rating--"){
            $em = "You need to choose your rating out of 5";
        }else{
            $sql = "UPDATE myshows set rating = '$rate' where myshow_id = '$myshow_id'";
            $result = mysqli_query($conn,$sql);
            if($result){
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
        <form action="" class="login-form text-center" method="POST" enctype="multipart/form-data">
            <h1 class="mb-5 font-weight-light text-uppercase">Rate your favourite Show</h1>
            
            <div class="mb-3">
                <label for="rate" 
                    class="form-label">Your Rating: </label>
                <select class="form-select" id="rate" name="rate">
                    <option selected>--Rating--</option>
                    <option value="1.0">1</option>
                    <option value="2.0">2</option>
                    <option value="3.0">3</option>
                    <option value="4.0">4</option>
                    <option value="5.0">5</option>
                </select>
            </div>
            <h6 style="color: red;"><?php if(isset($em)) echo $em; ?></h6>

            <button type="submit" name="submit" class="btn mt-5 btn-custom btn-block text-uppercase rounded-pill btn-lg">Rate</button>
        </form>
    </div>
</body>
</html>