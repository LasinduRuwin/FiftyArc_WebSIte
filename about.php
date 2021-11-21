<?php
    session_start();
?>
<!DOCTYPE php>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About Us</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/Navbar.css">
        <link rel="stylesheet" href="css/Style.css">
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
                        <a class="active" href="about.php">About</a>
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

        <!-- page heading and background image -->
        <div class="img-overlay">
            <div class="page-heading">
                <div class="heading">
                    <h1>About Us</h1>
                </div>
            </div>
        </div>
        <!-- page heading and background image end-->
        <!-- Aboutus Content -->
        <div class="about-container">
            <h3 class="about-sub-heading">Step Towards Future</h3>
            <hr>
            <div class="about-text">
                <p>
                Fifty Arc is a higher educational institution which provides courses in different fields such 
as Information Technology, English Language Training and Corporate Training. Classes 
are also conducted for Business Administration degrees (external). Other than that, it is 
mainly targeted at providing ICT degrees and related diploma courses. It is one of the 
popular private education institutions in Sri Lanka. Also, it provides opportunities for 
students to get enrolled with foreign university affiliated courses. Therefore, FiftyArc 
leverages affiliations to empower the youth to shape their lives and create their future by 
providing a recognized, affordable and up-to-date degrees.
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

</php>