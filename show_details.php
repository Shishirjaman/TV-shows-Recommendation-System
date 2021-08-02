<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
        header('Location:login.php');
      }
    $email = $_SESSION['email'];
    // $user_id =  $_SESSION['user_id'];
?>

<?php
    if(isset($_POST['show_id'])){
        $show_id = $_POST['show_id'];
        $sql = "SELECT * from tvshows where show_id = '$show_id'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){

            $row = mysqli_fetch_assoc($result);
        }
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body style="background-color: #15131a;">
    <h4 style="color:#b1b8c7; text-align:center; margin: 20px; padding:10px;">Tv Show Details</h4>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
                <div class="card card-body" style="border: none; align-items:center; background-color: #15131a;">
                    <img class="image-responsive" style="max-height:200px; max-width:150px;"src="show/<?=$row['show_img']?>" alt="">
                </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="card card-body" style="margin: 20px 80px; padding:20px;background-color:#b1b8c7;">
        
        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Show Name:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['show_name']?></h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Show Category:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['category']?></h6>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Channel Name:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['channel']?></h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Days of week:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['day']?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Time:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['time']?></h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            
            </div>
            <div class="col-md-6">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;">Schedule:</h6>
            </div>
            <div class="col-md-4">
                    <h6 style="color: #15131a; text-align:left;margin:10px 0;padding:10px 0;"><?php echo $row['schedule']?></h6>
            </div>
        </div>
        
    </div>
</body>
</html>