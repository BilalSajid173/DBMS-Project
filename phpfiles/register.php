<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>JamiaCryptoWebsite</title>
    <link rel="icon" href="images/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="../phpfiles/register.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <header class="headerofpage">
        <!--<img class="logoimage" src="images/BTC_Logo.svg" alt="Logo image">-->
        <nav class="navbar">
            <a class="Homebutton" href="../index.html">Home</a>
            <a class="Contactndabout" href="">About</a>
            <a class="Contactndabout" href="">Contact</a>
            <a class="Contactndabout" href="">Crypto Prices</a>
        </nav>
        <nav class="navbar2">
            <!-- <a class="signupndlogin register" href="">Register</a> -->

        </nav>
    </header>
    <div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="register.php" method="POST">
					<label for="chk" aria-hidden="true">Fill all the information</label>
					<!-- <input type="text" name="studentid" placeholder="Jamia Student ID or Roll Number" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
                    <input type="password" name="pswd" placeholder="Confirm Password" required=""> -->
                    <input type="text" name="Student Name" placeholder="Name" required="">
                    <input type="text" name="Roll No" placeholder="Roll Number" required="">
                    <!-- <label for="Department"></label> -->
                    <select id="Department" name="Department">
                        <option value = "cs">Computer Science</option>
                        <option value = "ece">Electronics & Communication</option>
                        <option value = "ee">Electrical Engineering</option>
                        <option value = "me">Mechanical Engineering</option>
                        <option value = "ce">Civil Engineering</option>
                    </select>
                    <input type="text" name="Department" placeholder="Department" required=""> 
                    <input type="date" name="DOB" placeholder="Date of Birth" required=""> 
                    <select id="Gender" name="Gender">
                    <option value = "m">Male</option>
                        <option value = "f">Female</option>
                        <option value = "other">Other</option>
                    </select>
                    <input type="text" name="Address" placeholder="Address" required="" class="address">

					<button>Sign Up</button>
				</form>
			</div>

			</div>
	</div>


</body>
</html>