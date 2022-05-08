<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['studentid'])) {
    include 'dbconnect.php';
    $showAlert = false;
    $showError = false;
    $exist = false;
    if (isset($_POST['password'])) {
        $name = $_POST['studentname'];
        $pswrd = $_POST['password'];
        $cpswrd = $_POST['cpassword'];
        $rollno = $_POST['rollno'];
        $id = $_POST['studentid'];
        $deptname = $_POST['deptname'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $contactno = $_POST['contactno'];
        $btcinvest=0;
        $avgbtcbuy=0;
        $ethinvest=0;
        $avgethbuy=0; 
        $tethinvest=0;
        $avgtethbuy=0; 

        $bininvest=0;
        $avgbinbuy=0;
        $liteinvest=0;
        $avglitebuy=0; 
        $dogeinvest=0;
        $avgdogebuy=0; 
        $avainvest=0;
        $avgavabuy=0;
        $jamiacoin=100;
        

        $existsql = "SELECT * FROM `login_info` WHERE studentid='$id'";
        $existresult = mysqli_query($conn, $existsql);
        $existnum = mysqli_num_rows($existresult);
        if ($existnum > 0) {
            $exist = true;
        } else {
            $exist = false;
        }

        if ($pswrd == $cpswrd && $existnum == 0) {
            $hash1 = password_hash($pswrd, PASSWORD_DEFAULT);
            $hash2 = password_hash($cpswrd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `login_info` (`studentid`, `password`,`time`) VALUES ('$id', '$hash1', current_timestamp())";
            $result = mysqli_query($conn, $sql);
 ////////////////           ////////////////////
            $sql1="INSERT INTO `student_info` (`name`, `studentid`, `rollno`, `deptname`, `gender`, `email`, `contactno`) VALUES ('$name', '$id', '$rollno', '$deptname', '$gender', '$email', '$contactno')";
            $result1 = mysqli_query($conn, $sql1);
//////////////////////////////////
            $sql_wallet="INSERT INTO `crypto_wallet` (`studentid`, `bitcoin_investment`, `avg_btc_buyprice`, `ethereum_investment`, `avg_eth_buyprice`, `tether_investment`,`avg_teth_buyprice`,`lite_investment`,`avg_lite_buyprice`,`binance_investment`, `avg_bin_buyprice`, `doge_investment`,`avg_doge_buyprice`,`ava_investment`,`avg_ava_buyprice`,`jamiacoin`) VALUES ('$id', '$btcinvest', '$avgbtcbuy', '$ethinvest', '$avgethbuy', '$tethinvest', '$avgtethbuy','$liteinvest','$avglitebuy','$bininvest','$avgbinbuy','$dogeinvest','$avgdogebuy','$avainvest','$avgavabuy','$jamiacoin')";
            $result_wallet=mysqli_query($conn,$sql_wallet);
            if ($result) {
                $showAlert = true;
            }
        }
        if ($pswrd != $cpswrd) {
            $showError = true;
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
    <title>SignUP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="images/favicon.ico.jpeg">
    <link rel="stylesheet" href="signup.css">
    <script src="xx.js"></script>
</head>

<body">

    <header class="headerofpage" style="position:relative; margin-right:20px;margin-top:15px;">
        <img src="../images/cover.png" alt="" class="logo">
        <nav>
            <ul class="navbar">
                <li><a href="../index.html">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="../contactform/index.php">Contact</a></li>
                <li><a href="../prices.php">Crypto Prices</a></li>
            </ul>
        </nav>
        <a href="login.php" class="cta">Login</a>
    </header>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($showAlert == true) {
            echo '<span style="color:white; background-color:green; font-size:25px;width:10px; text-align:center"> Successfully submitted the details.<br><br></span>';
        }
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($showError == true && $exist == false) {
            echo '<span style="color:white; background-color:red; font-size:25px;width:10px; text-align:center"><b>Error!</b>  Passwords do not match.<br><br></span>';
        }
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($showError == false && $exist == true) {
            echo '<span style="color:white; background-color:red; font-size:25px;width:10px; text-align:center"><b>Error!</b>  StudentID already taken.<br><br></span>';
        }
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($showError == true && $exist == true) {
            echo '<span style="color:white; background-color:red; font-size:25px;width:10px; text-align:center"><b>Error!</b> Passwords do not match and StudentID already taken.<br><br></span>';
        }
    }
    ?>
    <div class="signup-form-container">

        <div class="wrapper-signup">


            <h2>Registration Form</h2>

            <form action="signup.php" method="post" id="contact_form">

                <input required="" name="studentname" placeholder="First Name" type="text">

                <input required="" name="studentid" placeholder="Student ID" type="number">

                <input required="" name="rollno" placeholder="Roll Number" type="text">

                <input required="" name="email" placeholder="E-Mail Address" type="email">

                <select required="" name="deptname">
                    <option value="">Select your Department/Office</option>
                    <option>Computer Science</option>
                    <option>Electronics & Communication</option>
                    <option>Electrical Engineering</option>
                    <option>Mechanical Engineering</option>
                    <option>Civil Engineering</option>
                    <option>BA.Economics(Hons)</option>
                    <option>B.Com</option>
                </select>

                <select required="" name="gender">
                    <option value="">Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>

                <input required="" name="password" placeholder="Password" type="password">

                <input required="" name="cpassword" placeholder="Confirm Password" type="password">

                <input required="" name="contactno" placeholder="Contact No." type="number">

                <button type="submit" class="btn btn-warning">SUBMIT</button>

            </form>

        </div>

    </div>
    </body>

</html>
