<?php
    session_start();
?>
<!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="css/Navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="signin-and-signup-body">
 <!-- Top Navigation bar -->

 <nav class="navbar">
            <div class="brand-icon">
                <a class="logo" href="index.php">
                    <img class="logo" src="assets/icons/logo3.png" alt="">
                </a>
            </div>
            <a href="#" class="toggle-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <div class="navbar-links">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a  href="about.php">About</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact Us</a>
                    </li>
                    <li>
                        <a href="courses.php">Courses</a>
                    </li>
                    <li>
                    <?php
                    if(isset($_SESSION["username"])){
                        if($_SESSION["accType"]=="administrator"){
                            echo "<li><a href='admin.php'>Admin Pannel</a></li><li><a href='Includes/logout-config.php'>Logout</a></li>";
                        }else{
                            echo "<li><a href='account.php'>Account</a></li><li><a href='Includes/logout-config.php'>Logout</a></li>";
                        }
                        
                    }else{
                        echo "<li><a href='signin.php'>SignIn</a></li>";
                    }

                ?>
                </ul>
            </div>
        </nav>
        <!-- Top Navigation bar End -->
    <!-- Signup form -->
    <div class="signin-and-signup-form">
        <i class="fa fa-user-circle"></i>
        <h1>SignUp</h1>
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"]=="emailalreadyExists"){
                echo "<p class='signup_error_message'>E-mail already exists !</p>";
            }
        }
         ?>
        <form action="/Includes/signup-config.php" method="POST">

            <input class="inputbox-signin-and-signup" type="text" name="Fname" id="Fname" placeholder=" Your Full Name" required>
            <input class="inputbox-signin-and-signup" type="email" name="email" id="email" placeholder="Your Email" required>
            <input class="inputbox-signin-and-signup" type="password" name="password" id="passwprd" placeholder=" Create Your Password" required>
            <input class="inputbox-signin-and-signup" type="password" name="Cpassword" id="Cpasswprd" placeholder=" Confirm Your Password" required>
            <br>
            <button class="signin-and-signup-btn" type="submit" name="submit">SignIn</button>
        </form>
        <p>Already have an Account? <a href="Signin.php">SignIn</a></p>
    </div>


    <script src="js/NavBar.js"></script>
</body>

</php>