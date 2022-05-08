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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="images/favicon.ico.jpeg">
    <link rel="stylesheet" href="login.css">
    <script src="xx.js"></script>
</head>

<body>

    <header class="headerofpage">
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
            if ($login == true) {
                echo '<h5 style="text-align:center"> Successfully logged in!!</h5>';
            }
        }
        ?>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($showError == true) {
                echo '<br><h5 style="color:red;text-align:center">Error! Invalid Credentials</h5>';
            }
        }
        ?>

    <div class="login-form-container">

        <div class="wrapper-login">

            <h4>Please Enter Valid Credentials</h4>

            <form action="login.php" method="post" id="contact_form">

                <input required="" name="studentid" placeholder="Student ID" type="text">

                <input required="" name="password" placeholder="Password" type="password">

                <button type="submit" class="btn btn-outline-primary">Login</button>

                <p>New User? <a href="signup.php"> Create Account</a></p>

            </form>
        </div>

    </div>


</body>

</html>
