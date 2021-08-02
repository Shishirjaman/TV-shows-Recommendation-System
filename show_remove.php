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
        $sql = "DELETE from tvshows where show_id = '$show_id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            header('Location:admin.php');
        }
    }    
?>