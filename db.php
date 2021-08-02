<?php
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'tvshows';
$conn = mysqli_connect($server,$user,$password,$database);

if(!$conn){
    echo "can't establish the connection!!";
}

?>