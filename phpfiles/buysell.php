<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
include './webscraping/index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prices.css">
    <link rel="icon" href="images/favicon.ico.jpeg">
    <title>Crypto Prices</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
                <li><a href="wallet.php">Wallet</a></li>
            </ul>
        </nav>
        <a href="logout.php" class="cta">Logout</a>
    </header>
    <br><br><br>
</center>
    <h3>Bitcoin current price : 3883877</h3>
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <form target="_parent" action="./CoinBuy/btcbuy.php">
          <a href="./CoinBuy/btcbuy.php">  <button type="button" class="btn btn-success">Buy</button></a>
    </div>
    </form>
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <form target="_parent" action="./CoinBuy/btcbuy.php">
          <a href="./CoinBuy/btcsell.php">  <button type="button" class="btn btn-warning">Sell</button></a>
    </div>
    </form>
</body>

</html>