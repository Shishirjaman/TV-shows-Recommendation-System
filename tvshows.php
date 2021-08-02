<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
      header('Location:login.php');
    }
    $email = $_SESSION['email'];
    $user_id =  $_SESSION['user_id'];
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

<br>

<div class="card card-body" style="background-color:#15131a; border:none; border-radius:none; margin:0; padding:0;">
  <div class="container d-flex justify-content-center align-items-center" style="min-height: 10vh;">
    <form action="" class="login-form text-center" method="POST" enctype="multipart/form-data">  
        <div class="form-group" style="padding: 5px;">
              <select class="form-select rounded-pill form-select-lg" name="category">
                  <option value="All" selected>--All--</option>
                  <option value="News">News</option>
                  <option value="Serial Drama">Serial Drama</option>
                  <option value="Health">Health</option>
                  <option value="Talk Show">Talk Show</option>
                  <option value="Islamic Show">Islamic Show</option>
                  <option value="Movie">Movie</option>
                  <option value="Musical Show">Musical Show</option>
                  <option value="Telefilm">Telefilm</option>
                  <option value="Cartoon">Cartoon</option>
                  <option value="Drama">Drama</option>
              </select>
        </div>
        <button type="submit" name="submit" class="btn mt-5 btn-custom btn-block text-uppercase rounded-pill btn-lg" style="background-color: blueviolet;">Search</button>
    </form>
  </div> 

    <h4 style="color:#b1b8c7; margin:10px; padding:10px; text-align:center;">Tv Shows</h4>

    
    <table class="table table-dark table-striped" style="color:#b1b8c7;">
        <tr>
            <th>Show Name</th>
            <th>Channel Name</th>
            <th>Day</th>
            <th>Time(BDT)</th>
            <th>Add to My List</th>
        </tr>

    <?php
      if(!isset($_POST['submit'])){
        $sql = "SELECT * from tvshows";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
      
    ?>
        <tr>
            <td><?php echo $row['show_name']?></td>
            <td><?php echo $row['channel']?></td>
            <td><?php echo $row['day']?></td>
            <td><?php echo $row['time']?></td>
            <td>
                <form action="" method="POST">
                <button type="submit" name="btn" class="btn btn-success rounded-pill btn-sm">Add</button>
                <input type="hidden" name="show_id" value="<?php echo $row['show_id'] ?>">
                </form>
            </td>
        </tr>
    <?php
        }
      }
    }
    ?>


<?php
      if(isset($_POST['submit'])){
        $category = $_POST['category'];
        if($category =="All"){
        $sql = "SELECT * from tvshows";
        }else{
          $sql = "SELECT * from tvshows where category = '$category'";
        }
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
          while($row = mysqli_fetch_assoc($result)){
      
    ?>
        <tr>
            <td><?php echo $row['show_name']?></td>
            <td><?php echo $row['channel']?></td>
            <td><?php echo $row['day']?></td>
            <td><?php echo $row['time']?></td>
            <td>
                <form action="" method="POST">
                <button type="submit" name="button" class="btn btn-success rounded-pill btn-sm">Add</button>
                <input type="hidden" name="show_id" value="<?php echo $row['show_id'] ?>">
                </form>
            </td>
        </tr>
    <?php
        }
      }
    }
    ?>

<?php
  if(isset($_POST['btn']) && isset($_POST['show_id'])){
    $show_id = $_POST['show_id'];
    $sql = "SELECT * from tvshows where show_id = $show_id";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
      $row = mysqli_fetch_assoc($result);
      $show_name = $row['show_name'];
      $channel = $row['channel'];
      $time = $row['time'];
      $day = $row['day'];
      $schedule = $row['schedule'];
      $category = $row['category'];
      $show_img = $row['show_img'];
      $rating = 0;
    }
    $sql = "SELECT * from myshows where show_id = '$show_id' and user_id = '$user_id'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
      echo "<h4 style='color:red;'>You have already Added this show!!</h4>";
    }else{                
      $sql = "INSERT into myshows (myshow_name,mychannel,mycategory,mytime,myday,myschedule,myshow_img,rating,show_id,user_id)
              values ('$show_name','$channel','$category','$time','$day','$schedule','$show_img','$rating','$show_id','$user_id')";
      $result = mysqli_query($conn,$sql);
      if($result){
        echo "<h4 style='color:green;'>Added</h4>";
      }
    }
  }
?>
    </table>
</div>