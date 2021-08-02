<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
        header('Location:login.php');
      }
    $email = $_SESSION['email'];
?>
<?php
    $sql = "SELECT user_id,name,profile from users where email = '$email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
             $_SESSION['user_id'] = $row['user_id'];
    
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

</head>
<body style="background-color: #15131a;">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#222124;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="color:#b1b8c7;">
    <!-- <img src="images/icon.jpg" alt="logo"  style="border-radius:50%; width:30px; height:24px;"> -->
        Show Recommender
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="profile.php" style="color:#b1b8c7;">Home</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="recommended.php" style="color:#b1b8c7;">Recommended</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="tvshows.php" style="color:#b1b8c7;">TV Shows</a>
        </li>  
    </ul>

    <a class="nav-link active" aria-current="page" href="logout.php" style="color:#b1b8c7; background-color:teal; border-radius:6px; text-align:right; text-decoration: none;">Log out</a>
          
    </div>
  </div>
</nav>

<div class="card card-body" style="background-color:#15131a; border:none; border-radius:none; margin:0; padding:0;">
    <h4 style="color:#b1b8c7; margin:10px; padding:10px; text-align:center;">User Profile</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body" style="background-color:#15131a; border:none; border-radius:none; margin:10; padding:10; align-items:center; text-align:center; align-content:center;">
                <img class="image-responsive" style="max-height:200px; max-width:150px; border-radius:45%"src="profile/<?=$row['profile']?>" alt="">
                <h6 style="color:#b1b8c7; margin:10px; padding:10px"><?php echo $row['name']?></h6>
            </div>
        </div>
 <?php
        }}
 ?>       

 <?php
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT COUNT(myshow_id) as tot_shows from myshows where user_id = '$user_id'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $tot_shows = $row['tot_shows'];
    }else{
        $tot_shows = 0;
    }
 ?>
        <div class="col-md-4">
            <div class="card card-body" style="background-color:#15131a; border:none; border-radius:4%; margin:10px; padding:10px;">
                <div style="background-color: teal; border:none; border-radius:4%; margin:10; padding:10;">
                    <h6 style="color:#b1b8c7; margin:10px; padding:10px; text-align:center;">Total Added shows</h6>
                    <h3 style="color:#b1b8c7; margin:10px; padding:10px; text-align:center;"><?php echo $tot_shows ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md">
                <form action="profile_details.php" method="POST">
                    <div style="margin:30px; padding:10px; align-items:center; text-align:center; align-content:center;">
                        <button class="btn btn-custom" style="background-color:slateblue; color:#b1b8c7;" name="button">Details</button>
                    </div>
                </form>
        </div>
    </div>
</div>

<div class="card card-body" style="background-color:#15131a; border:none; border-radius:none; margin:0; padding:0;">
    <h4 style="color:#b1b8c7; margin:10px; padding:10px; text-align:center;">Added TV Shows</h4>
    <table class="table table-dark table-striped" style="color:#b1b8c7;" >
        <tr>
            <th>Show Name</th>
            <th>Channel Name</th>
            <th>Day</th>
            <th>Time(BDT)</th>
            <th>Details</th>
            <th>Rate Now</th>
            <th>Remove</th>
        </tr>

        <?php
      if(!isset($_POST['submit'])){
          $user_id = $_SESSION['user_id'];
        $sql = "SELECT * from myshows where user_id = '$user_id'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
      
    ?>
        <tr>
            <td><?php echo $row['myshow_name']?></td>
            <td><?php echo $row['mychannel']?></td>
            <td><?php echo $row['myday']?></td>
            <td><?php echo $row['mytime']?></td>
            <td>
                <form action="myshow_details.php" method="POST">
                  <input type ="submit" class="btn btn-sm btn-custom" name="details" value="Details" style="background-color:slateblue; color:#b1b8c7;">
                  <input type="hidden" name="myshow_id" value="<?php echo $row['myshow_id'] ?>">
                </form>
            </td>
            <td>
                <form action="myshow_rate.php" method="GET">
                  <input type ="submit" class="btn btn-sm btn-custom" name="rate" value="Rate" style="background-color:orangered; color:#b1b8c7;">
                  <input type="hidden" name="myshow_id" value="<?php echo $row['myshow_id'] ?>">
                </form>
            </td>
            <td>
                <form action="myshow_remove.php" method="POST">
                  <input type ="submit" class="btn btn-sm btn-danger" name="remove" value="Remove" style="color:#b1b8c7;">
                  <input type="hidden" name="myshow_id" value="<?php echo $row['myshow_id'] ?>">
                </form>
            </td>
        </tr>
    <?php
        }
      }
    }
    ?>
    </table>
</div>