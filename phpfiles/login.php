<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';
    $login = false;
    $showError = false;
    if (isset($_POST['studentid'])) {
        $id = $_POST['studentid'];
        // $name = $_POST['studentname'];
        $pswrd = $_POST['password'];
        $exist = false;
        $sql_login = "SELECT * from login_info where studentid='$id'";
        
        $result_login = mysqli_query($conn, $sql_login);
        // 
        $num = mysqli_num_rows($result_login);
        
        if ($num == 1) {
            while ($row_login = mysqli_fetch_assoc($result_login)) {
                if (password_verify($pswrd, $row_login['password'])) {
                    echo "logged in";
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['studentid'] = $id;
                    
                    header("location:welcome.php");
                }
                else{
                    $showError=true;
                    // echo "anas";
                }
            }
        }
        else{
            $showError=true;
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
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="images/favicon.ico.jpeg">
    <link rel="stylesheet" href="login.css">
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
        <br><br><br>
        <br><br><br>
        <br>
        
        <form class="well form-horizontal" action="login.php" method="post" id="contact_form">
            <fieldset>

                <!-- Form Name -->
                <legend>
                    <center>
                        <h2><b>Log In </b></h2>
                    
                </legend><br>

                <!-- Text input-->

               

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-2 control-label">Student ID</label>
                    <div class="col-md-2 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  required="" name="studentid" placeholder="Student ID" class="form-control" type="text">
                        </div>
                    </div>
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-md-2 control-label">Password</label>
                    <div class="col-md-2 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  required="" name="password" placeholder="password" class="form-control" type="password">
                        </div>
                    </div>
                </div>
                <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($login == true) {
                echo '<h5> Successfully logged in!!</h5>';
            }
        }
        ?>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($showError == true) {
                echo '<br><h5 style="color:red">Error! Invalid Credentials</h5>';
            }
        }
        ?>
                <br>
                <a style="color:blue;"href="signup.php"> New user? Create Account</a>

                <!-- Text input-->

               

                <!-- Select Basic -->

               
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-3"><br>
                        <button type="submit" class="btn btn-warning" style="position:relative; margin-right:0px;">SUBMIT <span class="glyphicon glyphicon-send"></span></button>
                    </div>
                </div>

            </fieldset>
        </form>
        </center>
    </div>
    </div><!-- /.container -->
    </center>
</body>

</html>
