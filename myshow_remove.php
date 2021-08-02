<?php
    session_start();
    include('db.php');
    if(!isset($_SESSION['email'])){
        header('Location:login.php');
      }
    $email = $_SESSION['email'];
?>

<?php
    if(isset($_POST['myshow_id'])){
        $myshow_id = $_POST['myshow_id'];
        $sql = "DELETE from myshows where myshow_id = '$myshow_id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            header('Location:profile.php');
        }
    }    
?>