<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
        header('Location:login.php');
      }
    $email = $_SESSION['email'];
?>

<?php
    $sql = "SELECT * FROM tvshows";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){

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
          <a class="nav-link active" aria-current="page" href="addshow.php" style="color:#b1b8c7;">Add Show</a>
        </li>   
    </ul>

    <a class="nav-link active" aria-current="page" href="logout.php" style="color:#b1b8c7; background-color:teal; border-radius:6px; text-align:right; text-decoration: none;">Log out</a>
          
    </div>
  </div>
</nav>

<br>

<div class="card card-body" style="background-color:#15131a; border:none; border-radius:none; margin:0; padding:0;">
    <h4 style="color:#b1b8c7; margin:10px; padding:10px; text-align:center;"> ALL Tv Shows</h4>
    <table class="table table-dark table-striped" style="color:#b1b8c7;" >
        <tr>
            <th>Show Name</th>
            <th>Channel Name</th>
            <th>Category</th>
            <th>Details</th>
            <th>Update</th>
            <th>Remove</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td style="color:#b1b8c7;"><?php echo $row['show_name']?></td>
            <td style="color:#b1b8c7;"><?php echo $row['channel']?></td>
            <td style="color:#b1b8c7;"><?php echo $row['category']?></td>
            <td>
                <form action="show_details.php" method="POST">
                  <input type ="submit" class="btn btn-sm btn-custom" name="details" value="Details" style="background-color:slateblue; color:#b1b8c7;">
                  <input type="hidden" name="show_id" value="<?php echo $row['show_id'] ?>">
                </form>
            </td>
            <td>
                <form action="show_update.php" method="GET">
                  <input type ="submit" class="btn btn-sm btn-custom" name="update" value="Update" style="background-color:orangered; color:#b1b8c7;">
                  <input type="hidden" name="show_id" value="<?php echo $row['show_id'] ?>">
                </form>
            </td>
            <td>
                <form action="show_remove.php" method="POST">
                  <input type ="submit" class="btn btn-sm btn-danger" name="remove" value="Remove" style="color:#b1b8c7;">
                  <input type="hidden" name="show_id" value="<?php echo $row['show_id'] ?>">
                </form>
            </td>
        </tr>

        <?php
            }
        }
        ?>
    </table>
</div>