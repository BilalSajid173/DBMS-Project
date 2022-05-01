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
                <li><a href="../index.html">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="../contactform/index.php">Contact</a></li>
                <li><a href="../prices.php">Crypto Prices</a></li>
            </ul>
        </nav>
        <a href="login.php" class="cta">Login</a>
    </header>
</center>
    <br>
    <br><br><br><center>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($showAlert == true) {
            echo '<span style="color:white; background-color:green; font-size:25px;width:10px;"> Successfully submitted the details.<br><br></span>';
        }
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($showError == true && $exist == false) {
            echo '<span style="color:white; background-color:red; font-size:25px;width:10px;"><b>Error!</b>  Passwords do not match.<br><br></span>';
        }
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($showError == false && $exist == true) {
            echo '<span style="color:white; background-color:red; font-size:25px;width:10px;"><b>Error!</b>  StudentID already taken.<br><br></span>';
        }
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($showError == true && $exist == true) {
            echo '<span style="color:white; background-color:red; font-size:25px;width:10px;"><b>Error!</b> Passwords do not match and StudentID already taken.<br><br></span>';
        }
    }
    ?>
    </center>
    <center>
    <div class="container">

        <form class="well form-horizontal" action="signup.php" method="post" id="contact_form">
            <fieldset>

                <!-- Form Name -->
                <legend>
                    <center>
                        <h2><b>Registration Form</b></h2>
                    </center>
                </legend><br><br>
                <!-- Text input-->

                <div class="form-group">Student Name</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input required="" name="studentname" placeholder="First Name" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Student ID</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input required="" name="studentid" placeholder="Student ID" class="form-control" type="number">
                        </div>
                    </div>
                </div>
                <div class="form-group">Roll Number</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input required="" name="rollno" placeholder="Roll Number" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input  required="" name="email" placeholder="E-Mail Address" class="form-control" type="email">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Department / Office</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select  required="" name="deptname" class="form-control selectpicker">
                                <option value="">Select your Department/Office</option>
                                <option>Computer Science</option>
                                <option>Electronics & Communication</option>
                                <option>Electrical Engineering</option>
                                <option>Mechanical Engineering</option>
                                <option>Civil Engineering</option>
                                <option>BA.Economics(Hons)</option>
                                <option>B.Com</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Gender</label>
                    <div class="col-md-4 selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select  required="" name="gender" class="form-control selectpicker">
                                <option value="">Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Text input-->


                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  required="" name="password" placeholder="Password" class="form-control" type="password">
                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Confirm Password</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input required=""  name="cpassword" placeholder="Confirm Password" class="form-control" type="password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Contact No.</label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input required=""  name="contactno" placeholder="Contact No." class="form-control" type="number">
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                


                <!-- Text input-->

               

                <!-- Select Basic -->

               
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-3"><br>
                        <button type="submit" class="btn btn-warning" style="position:relative; margin-right:-5px;">SUBMIT <span class="glyphicon glyphicon-send"></span></button>
                    </div>
                </div>

            </fieldset>
        </form>
        </center>
    </div>
    </div><!-- /.container -->
</body>

</html>