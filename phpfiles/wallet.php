<?php


session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

include 'dbconnect.php';
include './webscraping/index.php';
$id=$_SESSION['studentid'];
$sql_student = "SELECT * from student_info where studentid='$id'";
$result_student = mysqli_query($conn, $sql_student);
$row_student=mysqli_fetch_assoc($result_student);
$_SESSION['studentname'] = $row_student['name'];

$sql_wallet = "SELECT * from crypto_wallet where studentid='$id'";
$result_wallet = mysqli_query($conn, $sql_wallet);
$row_wallet = mysqli_fetch_assoc($result_wallet);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="images/favicon.ico.jpeg">
    <link rel="stylesheet" href="../styles.css">
    <script src="xx.js"></script>
</head>

<body style="background-color:rgb(230, 254, 255);">
<center>
<header class="headerofpage" style="position:relative; margin-right:20px;margin-top:15px;">
        <img src="../images/cover.png" alt="" class="logo">
        <nav>
            <ul class="navbar">
                <li><a href="welcome.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="buysell.php">Buy and Sell</a></li>
                <li><a href="prices.php">Crypto Prices</a></li>
                <li><a href="">Wallet</a></li>
            </ul>
        </nav>
        <a href="logout.php" class="cta">Logout</a>
    </header>
<br> <br>
<h3> Total BTC investment : ₹ <?php echo $row_wallet['bitcoin_investment']; ?>
<h3> Average Buying price  : ₹ <?php echo $row_wallet['avg_btc_buyprice']; ?>
<h3> Current Buying price : <?php echo $btcpricestring; ?>
<h3> Current Value  : ₹ <?php
if($row_wallet['avg_btc_buyprice']==0){echo '0';}
else{ 
$current=$row_wallet['bitcoin_investment']/$row_wallet['avg_btc_buyprice']*$btc; 
echo round($current,2); }
?>
<h3> Returns : ₹ <?php 
if($row_wallet['avg_btc_buyprice']==0){echo '0';}
else{
echo round($current-$row_wallet['bitcoin_investment'],2);
} 
?>
</center>
</body>
</html>   