<?php

include ('simple_html_dom.php');

$html = file_get_html('https://gadgets360.com/finance/crypto-currency-price-in-india-inr-compare-bitcoin-ether-dogecoin-ripple-litecoin');
$btcpricestring= $html->find('td._cpr',0)->plaintext;
$btcpricestring1=str_replace(",","",$btcpricestring);
$btcpricestring2=str_replace("&#8377; ","",$btcpricestring1);
$btc=(double)$btcpricestring2;


$ethpricestring= $html->find('td._cpr',1)->plaintext;
$ethpricestring1=str_replace(",","",$ethpricestring);
$ethpricestring2=str_replace("&#8377; ","",$ethpricestring1);
$eth=(double)$ethpricestring2;

$tetherpricestring= $html->find('td._cpr',2)->plaintext;
$tetherpricestring1=str_replace(",","",$tetherpricestring);
$tetherpricestring2=str_replace("&#8377; ","",$tetherpricestring1);
$tether=(double)$tetherpricestring2;

$litepricestring= $html->find('td._cpr',16)->plaintext;
$litepricestring1=str_replace(",","",$litepricestring);
$litepricestring2=str_replace("&#8377; ","",$litepricestring1);
$lite=(double)$litepricestring2;

$binancepricestring= $html->find('td._cpr',3)->plaintext;
$binancepricestring1=str_replace(",","",$binancepricestring);
$binancepricestring2=str_replace("&#8377; ","",$binancepricestring1);
$binance=(double)$binancepricestring2;

$dogepricestring= $html->find('td._cpr',12)->plaintext;
$dogepricestring1=str_replace(",","",$dogepricestring);
$dogepricestring2=str_replace("&#8377; ","",$dogepricestring1);
$doge=(double)$dogepricestring2;

$avpricestring= $html->find('td._cpr',9)->plaintext;
$avpricestring1=str_replace(",","",$avpricestring);
$avpricestring2=str_replace("&#8377; ","",$avpricestring1);
$av=(double)$avpricestring2;
/*-------------------------------------*
**************************************************************************/

$btcchangestring= $html->find('td._chngt span._chper',0)->plaintext;
$btcchangestring1=str_replace(",","",$btcchangestring);
$btcchangestring2=str_replace("&#8377; ","",$btcchangestring1);
$btcchange=(double)$btcchangestring2;

$ethchangestring= $html->find('td._chngt span._chper',1)->plaintext;
$ethchangestring1=str_replace(",","",$ethchangestring);
$ethchangestring2=str_replace("&#8377; ","",$ethchangestring1);
$ethchange=(double)$ethchangestring2;

$tetherchangestring= $html->find('td._chngt span._chper',2)->plaintext;
$tetherchangestring1=str_replace(",","",$tetherchangestring);
$tetherchangestring2=str_replace("&#8377; ","",$tetherchangestring1);
$tetherchange=(double)$tetherchangestring2;

$litechangestring= $html->find('td._chngt span._chper',16)->plaintext;
$litechangestring1=str_replace(",","",$litechangestring);
$litechangestring2=str_replace("&#8377; ","",$litechangestring1);
$litechange=(double)$litechangestring2;

$binancechangestring= $html->find('td._chngt span._chper',3)->plaintext;
$binancechangestring1=str_replace(",","",$binancechangestring);
$binancechangestring2=str_replace("&#8377; ","",$binancechangestring1);
$binancechange=(double)$binancechangestring2;

$dogechangestring= $html->find('td._chngt span._chper',12)->plaintext;
$dogechangestring1=str_replace(",","",$dogechangestring);
$dogechangestring2=str_replace("&#8377; ","",$dogechangestring1);
$dogechange=(double)$dogechangestring2;

$avchangestring= $html->find('td._chngt span._chper',9)->plaintext;
$avchangestring1=str_replace(",","",$avchangestring);
$avchangestring2=str_replace("&#8377; ","",$avchangestring1);
$avchange=(double)$avchangestring2;

$flexchangestring= $html->find('td._chngt span._chper',47)->plaintext;
$flexchangestring1=str_replace(",","",$flexchangestring);
$flexchangestring2=str_replace("&#8377; ","",$flexchangestring1);
$flexchange=(double)$flexchangestring2;

$flexpricestring= $html->find('td._cpr',47)->plaintext;
$flexpricestring1=str_replace(",","",$flexpricestring);
$flexpricestring2=str_replace("&#8377; ","",$flexpricestring1);
$flex=(double)$flexpricestring2;



?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../wallet.php">Wallet</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/webscraping/index.php">Crypto Prices</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<br><hr>
    
     
    <?php
  //  echo '<h1>Bitcoin Price right now is : '. $btcpricestring . '</h1>'
  //  ?>
  //  <?php
  //  $btcbuyingprice=2973688;
  //  $btcamountinvested=1000;
  //  $btccurrentval=($btcamountinvested/$btcbuyingprice)*$btc;
  //  $btcprofit=$btccurrentval-$btcamountinvested;
  //  echo
  //  '<h2>Price at which I invested : ₹ '.$btcbuyingprice.'</h2>
  //  <h2> Amount invested : ₹ ' .$btcamountinvested.' </h2>
  //  <h2> Current value = ₹ '.$btccurrentval.'</h2>
  //  <h3> Profit = ₹ '.(int)$btcprofit.'</h3>'; 
  //  ?>
  //  <hr>
  //  <hr>
  //  <?php 
  //  echo '<h1>Ethereum Price right now is : '. $ethpricestring . '</h1>'
  //  ?>
  //  <?php
  //  $ethbuyingprice=207825;
  //  $ethamountinvested=500;
  //  $ethcurrentval=($ethamountinvested/$ethbuyingprice)*$eth;
  //  $ethprofit=$ethcurrentval-$ethamountinvested;
  //  echo
  //  '<h2>Price at which I invested : ₹ '.$ethbuyingprice.'</h2>
  //  <h2> Amount invested : ₹ ' .$ethamountinvested.' </h2>
  //  <h2> Current value = ₹ '.$ethcurrentval.'</h2>
  //  <h3> Profit = ₹ '.(int)$ethprofit.'</h3>'; 
   ?>
   </body>
</html> -->