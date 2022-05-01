<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

include '../dbconnect.php';
include '../webscraping/index.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{   
    if (isset($_POST['bitcoin_investment'])) {
        $id=$_SESSION['studentid'];

        $sql_update = "SELECT * from crypto_wallet where studentid='$id'";
        $result_update = mysqli_query($conn, $sql_update);
        $row_update = mysqli_fetch_assoc($result_update);

        $invbtc=$row_update['bitcoin_investment']+$_POST['bitcoin_investment'];
        $avgbtcbuy=(($row_update['bitcoin_investment']*$row_update['avg_btc_buyprice'])+($_POST['bitcoin_investment']*$_POST['avg_btc_buyprice']))/$invbtc;
       
        $currentinv=$row_update['bitcoin_investment'];
        $sql_btcinv="UPDATE `crypto_wallet` SET `bitcoin_investment` = '$invbtc' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_btcinv=mysqli_query($conn,$sql_btcinv);

        $sql_btc_buyp="UPDATE `crypto_wallet` SET `avg_btc_buyprice` = '$avgbtcbuy' WHERE `crypto_wallet`.`studentid` = $id;";
        $result_btc_buyp=mysqli_query($conn,$sql_btc_buyp);


        header("location:../wallet.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <form action="btcbuy.php" method="POST">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">How much you want to invest?</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='bitcoin_investment' required="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Current price of BTC</label>
    <input type="text" class="form-control" id="exampleInputPassword1"
    placeholder="Write the current price : ₹<?php echo $btc; ?> " name="avg_btc_buyprice" required="">
    <?php echo 'current price of btc : '.$btc;?>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button> 
    </form>
</body>
</html>