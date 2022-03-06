<?php
$servername="localhost";
$username="root";
$password="";
$database="login";
$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    echo "Error";
}
?>

