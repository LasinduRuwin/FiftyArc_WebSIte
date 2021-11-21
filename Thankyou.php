<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you !</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Navbar.css">
        
        <link rel="stylesheet" href="css/footer.css">
  </head>

<body>
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
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact Us</a>
                    </li>
                    <li>
                        <a href="courses.php">Courses</a>
                    </li>
                    
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
<div class="jumbotron d-flex align-items-center min-vh-100" style="background-color:white !important;">
  <div class="container text-center">
  <h1 class="display-6">Thank You!</h1>
  <p class="lead"><strong>Please check account</strong> to view your reservation Information.</p>
  <hr>
  <p>
    Want more Information ? <a href="contact.php">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to homepage</a>
  </p>
</div>
</div>
<!-- Footer -->
<footer class="footer">
            <div class="top-container">
                <ul>
                    <li>
                        <h3>Contact Us</h3>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>fiftyarc.info@gmail.com
                    </li>
                    <li> <i class="fa fa-phone"></i>+97-4598456</li>
                    <li> <i class="fa fa-location-arrow"></i>252B, Bellandara Road.</li>
                </ul>
            </div>
            <div class="top-container">
                <p>Allrights Reserved || &copy; FiftyArc</p>
            </div>

        </footer>
        <!-- Footer end-->
        <script src="js/NavBar.js"></script>
</body>
</html>