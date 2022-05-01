<?php

include './phpfiles/webscraping/index.php';

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
    
</head>

<body>

    <header class="headerofpage">
        <img src="images/cover.png" alt="" class="logo">
        <nav>
            <ul class="navbar">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="/contactform/index.php">Contact</a></li>
                <li><a href="prices.php">Crypto Prices</a></li>
            </ul>
        </nav>
        <a href="./phpfiles/login.php" class="cta">Login</a>
    </header>
    <br><br><br>
    <h1 class="main-heading">Latest Crypto Prices</h1>
    <?php echo '<h4 style="color:red">'.$lastupdated.'</h4>';?>
    <section class="table-section">
        <table class="price-table">
            <tr>
                <th class="col-1">CRYPTOCURRENCY</th>
                <th class="col-2">PRICE</th>
                <th class="col-3">24-Hour Change</th>
            </tr>
            <tr>
                <td>Bitcoin</td>
                <?php echo
                '<td>'.$btcpricestring.'</td>';
                ?>
                <?php
                if($btcchangestring[0]=='+'){ 
                echo
                '<td><span  style="background-color:darkgreen; color:white; padding:11px; border-radius:10px;">'.$btcchangestring.'</span></td>';
                }
                else{
                    echo
                '<td><span  style="background-color:#da0000; padding:11px; border-radius:10px; color:white;">'.$btcchangestring.'</span></td>';
                }
                ?>
            </tr>
            <tr>
                <td>Ethereum</td>
                <?php echo
                '<td>'.$ethpricestring.'</td>';
                ?>
                <?php
                if($ethchangestring[0]=='+'){ 
                echo
                '<td><span  style="background-color:darkgreen; color:white; padding:11px; border-radius:10px;">'.$ethchangestring.'</span></td>';
                }
                else{
                    echo
                '<td><span  style="background-color:#da0000; padding:11px; border-radius:10px; color:white;">'.$ethchangestring.'</span></td>';
                }
                ?>
            </tr>
            <tr>
                <td>Tether</td>
                <?php echo
                '<td>'.$tetherpricestring.'</td>';
                ?>
                <?php
                if($tetherchangestring[0]=='+'){ 
                echo
                '<td><span  style="background-color:darkgreen; color:white; padding:11px; border-radius:10px;">'.$tetherchangestring.'</span></td>';
                }
                else{
                    echo
                '<td><span  style="background-color:#da0000; padding:11px; border-radius:10px; color:white;">'.$tetherchangestring.'</span></td>';
                }
                ?>
            </tr>
            <tr>
                <td>Litecoin</td>
                <?php echo
                '<td>'.$litepricestring.'</td>';
                ?>
                <?php
                if($litechangestring[0]=='+'){ 
                echo
                '<td><span  style="background-color:darkgreen; color:white; padding:11px; border-radius:10px;">'.$litechangestring.'</span></td>';
                }
                else{
                    echo
                '<td><span  style="background-color:#da0000; padding:11px; border-radius:10px; color:white;">'.$litechangestring.'</span></td>';
                }
                ?>
            </tr>
            <tr>
                <td>Binance Coin</td>
                <?php echo
                '<td>'.$binancepricestring.'</td>';
                ?>
                <?php
                if($binancechangestring[0]=='+'){ 
                echo
                '<td><span  style="background-color:darkgreen; color:white; padding:11px; border-radius:10px;">'.$binancechangestring.'</span></td>';
                }
                else{
                    echo
                '<td><span  style="background-color:#da0000; padding:11px; border-radius:10px; color:white;">'.$binancechangestring.'</span></td>';
                }
                ?>
            </tr>
            <tr>
                <td>Dogecoin</td>
                <?php echo
                '<td>'.$dogepricestring.'</td>';
                ?>
                <?php
                if($dogechangestring[0]=='+'){ 
                echo
                '<td><span  style="background-color:darkgreen; color:white; padding:11px; border-radius:10px;">'.$dogechangestring.'</span></td>';
                }
                else{
                    echo
                '<td><span  style="background-color:#da0000; padding:11px; border-radius:10px; color:white;">'.$dogechangestring.'</span></td>';
                }
                ?>
            </tr>
            <tr>
                <td>Avalanche</td>
                <?php echo
                '<td>'.$avpricestring.'</td>';
                ?>
                <?php
                if($avchangestring[0]=='+'){ 
                echo
                '<td><span  style="background-color:darkgreen; color:white; padding:11px; border-radius:10px;">'.$avchangestring.'</span></td>';
                }
                else{
                    echo
                '<td><span  style="background-color:#da0000; padding:11px; border-radius:10px; color:white;">'.$avchangestring.'</span></td>';
                }
                ?>
            </tr>
        </table>
    </section>
    

</body>

</html>