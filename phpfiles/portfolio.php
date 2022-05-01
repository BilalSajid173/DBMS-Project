<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
include './webscraping/index.php';
include 'dbconnect.php';

$errorprice=false;
        $id=$_SESSION['studentid'];
        $sql_info = "SELECT * from student_info where studentid='$id'";
        $result_info = mysqli_query($conn, $sql_info);
        $row_info = mysqli_fetch_assoc($result_info);

        $name=$row_info['name'];
        $email=$row_info['email'];
        $deptname=$row_info['deptname'];
        $phone=$row_info['contactno'];
        
        $sql_return = "SELECT * from crypto_wallet where studentid='$id'";
        $result_return = mysqli_query($conn, $sql_return);
        $row_return = mysqli_fetch_assoc($result_return);
        
        //////////////////Jamia Coin/////////////
        $jamiacoinprice=0.00001*$btc+0.0003*$eth+0.009*$binance;
        /******************************** */
        
        if($row_return['avg_btc_buyprice']==0){$btcqty=0;}
        else{
        $btcqty=$row_return['bitcoin_investment']/$row_return['avg_btc_buyprice'];
        }
        if($row_return['avg_eth_buyprice']==0){$ethqty=0;}
        else{
        $ethqty=$row_return['ethereum_investment']/$row_return['avg_eth_buyprice'];
        }
        if($row_return['avg_teth_buyprice']==0){$tethqty=0;}
        else{
        $tethqty=$row_return['tether_investment']/$row_return['avg_teth_buyprice'];
        }
        if($row_return['avg_lite_buyprice']==0){$liteqty=0;}
        else{
        $liteqty=$row_return['lite_investment']/$row_return['avg_lite_buyprice'];
        }
        if($row_return['avg_bin_buyprice']==0){$binanceqty=0;}
        else{
        $binanceqty=$row_return['binance_investment']/$row_return['avg_bin_buyprice'];
        }
        if($row_return['avg_doge_buyprice']==0){$dogeqty=0;}
        else{
        $dogeqty=$row_return['doge_investment']/$row_return['avg_doge_buyprice'];
        }
        if($row_return['avg_ava_buyprice']==0){$avaqty=0;}
        else{
        $avaqty=$row_return['ava_investment']/$row_return['avg_ava_buyprice'];
        }

        $totalinvested=$row_return['bitcoin_investment']+$row_return['ethereum_investment']+$row_return['tether_investment']+$row_return['lite_investment']+$row_return['binance_investment']+$row_return['doge_investment']+$row_return['ava_investment'];

        if($row_return['avg_btc_buyprice']==0){$currentbtc=0;}
        else{
        $currentbtc=$row_return['bitcoin_investment']/$row_return['avg_btc_buyprice']*$btc;
        }
        if($row_return['avg_eth_buyprice']==0){$currenteth=0;}
        else{
        $currenteth=$row_return['ethereum_investment']/$row_return['avg_eth_buyprice']*$eth;
        }
        if($row_return['avg_teth_buyprice']==0){$currentteth=0;}
        else{
        $currentteth=$row_return['tether_investment']/$row_return['avg_teth_buyprice']*$tether;
        }
        if($row_return['avg_bin_buyprice']==0){$currentbin=0;}
        else{
        $currentbin=$row_return['binance_investment']/$row_return['avg_bin_buyprice']*$binance;
        }
        if($row_return['avg_lite_buyprice']==0){$currentlite=0;}
        else{
        $currentlite=$row_return['lite_investment']/$row_return['avg_lite_buyprice']*$lite;
        }
        if($row_return['avg_doge_buyprice']==0){$currentdoge=0;}
        else{
        $currentdoge=$row_return['doge_investment']/$row_return['avg_doge_buyprice']*$doge;
        }
        if($row_return['avg_ava_buyprice']==0){$currentav=0;}
        else{
        $currentav=$row_return['ava_investment']/$row_return['avg_ava_buyprice']*$av;
        }
        $totalcurrentval=$currentbtc+$currenteth+$currentteth+$currentlite+$currentbin+$currentdoge+$currentav;

        $netreturn=-$totalinvested+$totalcurrentval;
          
        
if ($_SERVER["REQUEST_METHOD"] == "POST")
{   
    if(isset($_POST['coinbuy'])){
    if (($_POST['coinbuy'])=="Bitcoin") {
        
        $id=$_SESSION['studentid'];
        
        if($_POST['avg_coin_buyprice']!=$btc){$errorprice=true;}
        else{
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['bitcoin_investment']+$_POST['coin_investment'];
        $avgcoinbuy=(($row_update['bitcoin_investment']*$row_update['avg_btc_buyprice'])+($_POST['coin_investment']*$_POST['avg_coin_buyprice']))/$invcoin;
       
        $currentinv=$row_update['bitcoin_investment'];
        $sql_coininv="UPDATE `crypto_wallet` SET `bitcoin_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        $sql_coin_buyp="UPDATE `crypto_wallet` SET `avg_btc_buyprice` = '$avgcoinbuy' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coin_buyp=mysqli_query($conn,$sql_coin_buyp);

        header("location:portfolio.php");
        }
    }
    if (($_POST['coinbuy'])=="Ethereum") {
        $id=$_SESSION['studentid'];
        if($_POST['avg_coin_buyprice']!=$eth){$errorprice=true;}
        else{
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['ethereum_investment']+$_POST['coin_investment'];
        $avgcoinbuy=(($row_update['ethereum_investment']*$row_update['avg_eth_buyprice'])+($_POST['coin_investment']*$_POST['avg_coin_buyprice']))/$invcoin;
       
        $currentinv=$row_update['ethereum_investment'];
        $sql_coininv="UPDATE `crypto_wallet` SET `ethereum_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        $sql_coin_buyp="UPDATE `crypto_wallet` SET `avg_eth_buyprice` = '$avgcoinbuy' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coin_buyp=mysqli_query($conn,$sql_coin_buyp);


        header("location:portfolio.php");
    }
    }
    if (($_POST['coinbuy'])=="Tether") {
        $id=$_SESSION['studentid'];
        if($_POST['avg_coin_buyprice']!=$tether){$errorprice=true;}
        else{
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['tether_investment']+$_POST['coin_investment'];
        $avgcoinbuy=(($row_update['tether_investment']*$row_update['avg_teth_buyprice'])+($_POST['coin_investment']*$_POST['avg_coin_buyprice']))/$invcoin;
       
        $currentinv=$row_update['tether_investment'];
        $sql_coininv="UPDATE `crypto_wallet` SET `tether_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        $sql_coin_buyp="UPDATE `crypto_wallet` SET `avg_teth_buyprice` = '$avgcoinbuy' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coin_buyp=mysqli_query($conn,$sql_coin_buyp);


        header("location:portfolio.php");
    }
}
    if (($_POST['coinbuy'])=="Litecoin") {
        $id=$_SESSION['studentid'];
        
        if($_POST['avg_coin_buyprice']!=$lite){$errorprice=true;}
        else{
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['lite_investment']+$_POST['coin_investment'];
        $avgcoinbuy=(($row_update['lite_investment']*$row_update['avg_lite_buyprice'])+($_POST['coin_investment']*$_POST['avg_coin_buyprice']))/$invcoin;
       
        $currentinv=$row_update['lite_investment'];
        $sql_coininv="UPDATE `crypto_wallet` SET `lite_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        $sql_coin_buyp="UPDATE `crypto_wallet` SET `avg_lite_buyprice` = '$avgcoinbuy' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coin_buyp=mysqli_query($conn,$sql_coin_buyp);


        header("location:portfolio.php");
    }
}
    if (($_POST['coinbuy'])=="Binance") {
        $id=$_SESSION['studentid'];
        if($_POST['avg_coin_buyprice']!=$binance){$errorprice=true;}
        else{
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['binance_investment']+$_POST['coin_investment'];
        $avgcoinbuy=(($row_update['binance_investment']*$row_update['avg_bin_buyprice'])+($_POST['coin_investment']*$_POST['avg_coin_buyprice']))/$invcoin;
       
        $currentinv=$row_update['binance_investment'];
        $sql_coininv="UPDATE `crypto_wallet` SET `binance_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        $sql_coin_buyp="UPDATE `crypto_wallet` SET `avg_bin_buyprice` = '$avgcoinbuy' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coin_buyp=mysqli_query($conn,$sql_coin_buyp);


        header("location:portfolio.php");
    }
}
    if (($_POST['coinbuy'])=="Dogecoin") {
        $id=$_SESSION['studentid'];
        if($_POST['avg_coin_buyprice']!=$doge){$errorprice=true;}
        else{
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['doge_investment']+$_POST['coin_investment'];
        $avgcoinbuy=(($row_update['doge_investment']*$row_update['avg_doge_buyprice'])+($_POST['coin_investment']*$_POST['avg_coin_buyprice']))/$invcoin;
        
        $currentinv=$row_update['doge_investment'];
        $sql_coininv="UPDATE `crypto_wallet` SET `doge_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        $sql_coin_buyp="UPDATE `crypto_wallet` SET `avg_doge_buyprice` = '$avgcoinbuy' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coin_buyp=mysqli_query($conn,$sql_coin_buyp);


        header("location:portfolio.php");
    }
}
    if (($_POST['coinbuy'])=="Avalanche") {
        $id=$_SESSION['studentid'];
        if($_POST['avg_coin_buyprice']!=$av){$errorprice=true;}
        else{
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['ava_investment']+$_POST['coin_investment'];
        $avgcoinbuy=(($row_update['ava_investment']*$row_update['avg_ava_buyprice'])+($_POST['coin_investment']*$_POST['avg_coin_buyprice']))/$invcoin;
        
        $currentinv=$row_update['ava_investment'];
        $sql_coininv="UPDATE `crypto_wallet` SET `ava_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        $sql_coin_buyp="UPDATE `crypto_wallet` SET `avg_ava_buyprice` = '$avgcoinbuy' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coin_buyp=mysqli_query($conn,$sql_coin_buyp);


        header("location:portfolio.php");
    }
}
}
    /**********Selling***********/
    if(isset($_POST['coinsell']))
    {
    if (($_POST['coinsell'])=="Bitcoin") {
        
        $id=$_SESSION['studentid'];
        
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['bitcoin_investment']-$_POST['coin_sellamnt'];
       
        $sql_coininv="UPDATE `crypto_wallet` SET `bitcoin_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        if($row_return['bitcoin_investment']!=0){
            $row_return['jamiacoin']=$row_return['jamiacoin']+(($btcqty*$btc-$row_return['bitcoin_investment'])/$row_return['bitcoin_investment'])*$jamiacoinprice;
        }    
            $jamiacoin=$row_return['jamiacoin'];
            $sql_jamiacoin="UPDATE `crypto_wallet` SET `jamiacoin` = '$jamiacoin' WHERE `crypto_wallet`.`studentid` = $id;";
            $result_jamiacoin=mysqli_query($conn,$sql_jamiacoin);
        
      
        header("location:portfolio.php");
    }
    if (($_POST['coinsell'])=="Ethereum") {
        
        $id=$_SESSION['studentid'];
        
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['ethereum_investment']-$_POST['coin_sellamnt'];
       
        $sql_coininv="UPDATE `crypto_wallet` SET `ethereum_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        if($row_return['ethereum_investment']!=0){
            $row_return['jamiacoin']=$row_return['jamiacoin']+(($ethqty*$eth-$row_return['ethereum_investment'])/$row_return['ethereum_investment'])*$jamiacoinprice;
        }    
            $jamiacoin=$row_return['jamiacoin'];
            $sql_jamiacoin="UPDATE `crypto_wallet` SET `jamiacoin` = '$jamiacoin' WHERE `crypto_wallet`.`studentid` = $id;";
            $result_jamiacoin=mysqli_query($conn,$sql_jamiacoin);


        header("location:portfolio.php");
    }
    if (($_POST['coinsell'])=="Tether") {
        $id=$_SESSION['studentid'];
        
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['tether_investment']-$_POST['coin_sellamnt'];
        
        $sql_coininv="UPDATE `crypto_wallet` SET `tether_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        if($row_return['tether_investment']!=0){
            $row_return['jamiacoin']=$row_return['jamiacoin']+(($tethqty*$tether-$row_return['tether_investment'])/$row_return['tether_investment'])*$jamiacoinprice;
        }    
            $jamiacoin=$row_return['jamiacoin'];
            $sql_jamiacoin="UPDATE `crypto_wallet` SET `jamiacoin` = '$jamiacoin' WHERE `crypto_wallet`.`studentid` = $id;";
            $result_jamiacoin=mysqli_query($conn,$sql_jamiacoin);

        header("location:portfolio.php");
    }
    if (($_POST['coinsell'])=="Litecoin") {
        $id=$_SESSION['studentid'];
        
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['lite_investment']-$_POST['coin_sellamnt'];
        
        $currentinv=$row_update['lite_investment'];
        $sql_coininv="UPDATE `crypto_wallet` SET `lite_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        if($row_return['lite_investment']!=0){
            $row_return['jamiacoin']=$row_return['jamiacoin']+(($liteqty*$lite-$row_return['lite_investment'])/$row_return['lite_investment'])*$jamiacoinprice;
        }    
            $jamiacoin=$row_return['jamiacoin'];
            $sql_jamiacoin="UPDATE `crypto_wallet` SET `jamiacoin` = '$jamiacoin' WHERE `crypto_wallet`.`studentid` = $id;";
            $result_jamiacoin=mysqli_query($conn,$sql_jamiacoin);

        header("location:portfolio.php");
    }
    if (($_POST['coinsell'])=="Binance") {
        $id=$_SESSION['studentid'];
        
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['binance_investment']-$_POST['coin_sellamnt'];
       
       
        $currentinv=$row_update['binance_investment'];
        $sql_coininv="UPDATE `crypto_wallet` SET `binance_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        if($row_return['binance_investment']!=0){
            $row_return['jamiacoin']=$row_return['jamiacoin']+(($binanceqty*$binance-$row_return['binance_investment'])/$row_return['binance_investment'])*$jamiacoinprice;
        }    
            $jamiacoin=$row_return['jamiacoin'];
            $sql_jamiacoin="UPDATE `crypto_wallet` SET `jamiacoin` = '$jamiacoin' WHERE `crypto_wallet`.`studentid` = $id;";
            $result_jamiacoin=mysqli_query($conn,$sql_jamiacoin);

       
        header("location:portfolio.php");
    }
    if (($_POST['coinsell'])=="Dogecoin") {
        $id=$_SESSION['studentid'];
        
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['doge_investment']-$_POST['coin_sellamnt'];
        
        $currentinv=$row_update['doge_investment'];
        $sql_coininv="UPDATE `crypto_wallet` SET `doge_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        if($row_return['doge_investment']!=0){
            $row_return['jamiacoin']=$row_return['jamiacoin']+(($dogeqty*$doge-$row_return['doge_investment'])/$row_return['doge_investment'])*$jamiacoinprice;
        }    
            $jamiacoin=$row_return['jamiacoin'];
            $sql_jamiacoin="UPDATE `crypto_wallet` SET `jamiacoin` = '$jamiacoin' WHERE `crypto_wallet`.`studentid` = $id;";
            $result_jamiacoin=mysqli_query($conn,$sql_jamiacoin);

        header("location:portfolio.php");
    }
    if (($_POST['coinsell'])=="Avalanche") {
        $id=$_SESSION['studentid'];
        
        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invcoin=$row_update['ava_investment']-$_POST['coin_sellamnt'];
       
        
        $currentinv=$row_update['ava_investment'];
        $sql_coininv="UPDATE `crypto_wallet` SET `ava_investment` = '$invcoin' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_coininv=mysqli_query($conn,$sql_coininv);

        if($row_return['ava_investment']!=0){
            $row_return['jamiacoin']=$row_return['jamiacoin']+(($avaqty*$av-$row_return['ava_investment'])/$row_return['ava_investment'])*$jamiacoinprice;
        }    
            $jamiacoin=$row_return['jamiacoin'];
            $sql_jamiacoin="UPDATE `crypto_wallet` SET `jamiacoin` = '$jamiacoin' WHERE `crypto_wallet`.`studentid` = $id;";
            $result_jamiacoin=mysqli_query($conn,$sql_jamiacoin);

        header("location:portfolio.php");
    }
    }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JamiaCryptoWebsite</title>

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.ico">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS style sheet -->
    <link rel="stylesheet" href="portfolio.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://kit.fontawesome.com/499f9a6e08.js" crossorigin="anonymous"></script>

</head>

<body>

    <!--------------------------------------------- Nav Bar -------------------------------------------->

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <img src="../images/cover.png" alt="" class="logo">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ">
                        <a href="welcome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="portfolio.php">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a href="prices.php">Crypto Prices</a>
                    </li>
                    <li class="nav-item">
                        <a class="cta" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>

<!--  Error Message -->


    <?php
    if($errorprice==true){
    echo'
    <div class="alert alert-danger" role="alert">
  <strong>Error!!</strong> Current price of selected coin entered wrong.
</div>';}
?>


<!--Error Message  -->

    <!----------------------- Jamia coin info     --------------->
<div style="margin: 50px 0;
  font-family: Montserrat;
  font-weight: 800;
  font-size:35px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  ">
    <span style="background-color:aqua; padding:20px; border-radius:20px;">Total Jamia Coin : <?php echo round($row_return['jamiacoin'],2); echo'🪙';?></span> 
</div>
     <!----------------------- Jamia coin info     --------------->

    <!--------------------------- TABLE 1 and info-table -------------------------------------------->

    <div class="tab1container">

        <table class="info-table">
            <tr>
                <th>Name:</th>
                <td><?php echo "$name"; ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo "$email"; ?></td>
            </tr>
            <tr>
                <th>Department:</th>
                <td><?php echo "$deptname"; ?></td>
            </tr>
            <tr>
                <th>Phone:</th>
                <td><?php echo $phone; ?></td>
            </tr>
        </table>

        <table class="table1">
            <tr>
                <th>Invested</th>
                <th>Current</th>
                <th>Returns</th>
                <th>Return%</th>
                
            </tr>
            <tr>
                <td><?php echo round($totalinvested,3); ?></td>
                <td><?php echo round($totalcurrentval,3); ?></td>
                <td><?php echo round($netreturn,3); ?></td>
                <td><?php
                if($totalinvested==0){echo '0%';}
                else{ 
                echo round(($netreturn/$totalinvested)*100,2); echo '%';} ?></td>
            </tr>
        </table>
    </div>

    <!------------------------------------Buying  ----------------------------------->

    <div class="buying">

        <button type="button" class="cross-btn-buy"><i class="fa-solid fa-xmark"></i></button>
        <form action="portfolio.php" method="POST">
            <label for="coin">Choose the coin:</label>
            <select name="coinbuy" id="coinbuy">
                <option value="Bitcoin" selected>Bitcoin</option>
                <option value="Ethereum">Ethereum</option>
                <option value="Tether">Tether</option>
                <option value="Litecoin">Litecoin</option>
                <option value="Binance">Binance coin</option>
                <option value="Dogecoin">Dogecoin</option>
                <option value="Avalanche">Avalanche</option>
            </select>

            <label for="investment">Investment:</label>
            <input name="coin_investment" type="number" step="any" class="inv" min="0" max="999999">

            <label for="curPrice">Current Price of coin:</label>
            <input name="avg_coin_buyprice" type="number" step="any" class="price" placeholder="Coin's current price : " min="0" >
            <button class="buy-btn" value="Buy">Buy</button>
        </form>
    </div>

    <!----------------------------- Selling ----------------------------------------->

    <div class="selling">

        <button type="button" class="cross-btn-sell"><i class="fa-solid fa-xmark"></i></button>
        <form action="portfolio.php" method="POST">
            <label for="coin">Choose the coin:</label>
            <select name="coinsell" id="coinsell">
                <option value="Bitcoin" selected>Bitcoin</option>
                <option value="Ethereum">Ethereum</option>
                <option value="Tether">Tether</option>
                <option value="Litecoin">Litecoin</option>
                <option value="Binance">Binance coin</option>
                <option value="Dogecoin">Dogecoin</option>
                <option value="Avalanche">Avalanche</option>
            </select>

            <label for="Selling-amt">Choose Amount:</label>
            <input name="coin_sellamnt" type="number" step="any" class="sold" min="0">
            <button class="sell-btn" value="Sell">Sell</button>
        </form>
    </div>


    <!---------------------------------------- Transfer ----------------------------------->

    <div class="transfer">

        <button type="button" class="cross-btn-transfer"><i class="fa-solid fa-xmark"></i></button>
        <form action="">

            <label for="user">Choose User:</label>
            <input type="text" name="user">

            <label for="coin">Choose the coin:</label>
            <select name="coin" id="coin">
                <option value="Bitcoin" selected>Bitcoin</option>
                <option value="Ethereum">Ethereum</option>
                <option value="Tether">Tether</option>
                <option value="Litecoin">Litecoin</option>
                <option value="Binance">Binance coin</option>
                <option value="Dogecoin">Dogecoin</option>
                <option value="Avalanche">Avalanche</option>
            </select>

            <label for="Transfer-amt">Choose Amount:</label>
            <input name="Transfer-amt" type="number" class="trade">

            <button class="transfer-btn" value="Transfer">Transfer</button>
        </form>
    </div>

    <!---------------------------- BUTTONS -------------------------------->

    <div class="buttons">
        <button type="button" class="btn btn-primary btn-lg buy">Buy</button>
        <button type="button" class="btn btn-primary btn-lg sell">Sell</button>
        <button type="button" class="btn btn-primary btn-lg trade">Transfer</button>
    </div>


    <!------------------------------------ TABLE 2 ----------------------------------->

    <div class="tab2container">

        <table class="crypto-table">
            <tr>
                <th>Coin(Qty Owned)</th>
                <th>Invested</th>
                <!-- <th>Current</th> -->
                <th>Return</th>
                <th>Avg Buy Price</th>
                <th>Current Live Price</th>
            </tr>
            
            <tr class="btc">
                <td>BitCoin (<?php echo round($btcqty,4); ?>)</td>
                <td><?php echo round($row_return['bitcoin_investment'],3); ?></td>
                
                <td><?php echo round($btcqty*$btc-$row_return['bitcoin_investment'],3); ?></td>
                <td><?php echo round($row_return['avg_btc_buyprice'],3);?></td>
                <td><?php echo $btc; ?></td>
            </tr>
            <tr class="etherium">
                <td>Ethereum (<?php echo round($ethqty,4); ?>)</td>
                <td><?php echo round($row_return['ethereum_investment'],3); ?></td>
                
                <td><?php echo round($ethqty*$eth - $row_return['ethereum_investment'],3); ?></td>
                <td><?php echo round($row_return['avg_eth_buyprice'],3);?></td>
                <td><?php echo $eth; ?></td>
            </tr>
            <tr class="tether">
                <td>Tether (<?php echo round($tethqty,4); ?>)</td>
                <td><?php echo round($row_return['tether_investment'],3); ?></td>
                
                <td><?php echo round($tethqty*$tether - $row_return['tether_investment'],3); ?></td>
                <td><?php echo round($row_return['avg_teth_buyprice'],3);?></td>
                <td><?php echo $tether; ?></td>
            </tr>
            <tr class="litecoin">
                <td>Litecoin (<?php echo round($liteqty,4); ?>)</td>
                <td><?php echo round($row_return['lite_investment'],3); ?></td>
                
                <td><?php echo round($liteqty*$lite - $row_return['lite_investment'],3); ?></td>
                <td><?php echo round($row_return['avg_lite_buyprice'],3);?></td>
                <td><?php echo $lite; ?></td>
            </tr>
            <tr class="binance">
                <td>Binance coin (<?php echo round($binanceqty,4); ?>)</td>
                <td><?php echo round($row_return['binance_investment'],3); ?></td>
               
                <td><?php echo round($binanceqty*$binance - $row_return['binance_investment'],3); ?></td>
                <td><?php echo round($row_return['avg_bin_buyprice'],3);?></td>
                <td><?php echo $binance; ?></td>
            </tr>
            <tr class="dogecoin">
                <td>Dogecoin (<?php echo round($dogeqty,4); ?>)</td>
                <td><?php echo round($row_return['doge_investment'],3); ?></td>
               
                <td><?php echo round($dogeqty*$doge - $row_return['doge_investment'],3); ?></td>
                <td><?php echo round($row_return['avg_doge_buyprice'],3);?></td>
                <td><?php echo $doge; ?></td>
            </tr>
            <tr class="avalanche">
                <td>Avalanche (<?php echo round($avaqty,4); ?>)</td>
                <td><?php echo round($row_return['ava_investment'],3); ?></td>
                
                <td><?php echo round($avaqty*$av - $row_return['ava_investment'],3); ?></td>
                <td><?php echo round($row_return['avg_ava_buyprice'],3);?></td>
                <td><?php echo $av; ?></td>
            </tr>
        </table>
    </div>


    <div class="lowerpara">
        <p>@2022 Cryptico Ltd.</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <script src="portfolio.js"></script>

</body>