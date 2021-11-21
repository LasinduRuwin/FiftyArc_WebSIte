<?php
    session_start();
?>
<!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                    <a class="active" href="index.php">Home</a>
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
    <!-- Section 01 hero carousel -->
    <section id="section1" class="hero">
        <span class="hero-intro">
            <h1><code>FiftyArc Institute</code>Step Toward the Future</h1>
            <p>
            FiftyArc is an institute that excels in the fields of English and IT. 
            Our vision is to refine and renovate our students to the 21st Century by helping them achieve their targets in Information Technology</p>
                <!-- <img src="assets/img/home1.jpg" alt=""> -->
        </span>
        <div class="slider">
        </div>

    </section>
    <!-- Section 01 hero carousel end-->
    <!-- Vision & Mission cards -->
    <div class="home-wrapper">
        <div class="home-cards">
            <!-- Section 02 Vision Tile -->
            <section id="section2-1" class="home-singlecard">
                <h3>Vision</h3>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Risus pretium quam vulputate dignissim suspendisse. Lectus urna duis convallis convallis tellus id interdum velit
                    laoreet. Adipiscing elit pellentesque habitant i tristique senectus et netus. Augue interdum velit euismod in pellentesque massa placerat duis ultricies. Elementum eu facilisis sed odio. Volutpat est velit egestas dui id ornare. Ac
                    odio tempor orci dapibus ultrices in iaculis nunc. Diam ut venenatis tellus in.
                </p>
            </section>
            <!-- Section 03 Mission Tile -->
            <section id="section2-3" class="home-singlecard">
                <h3>Mission</h3>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Risus pretium quam vulputate dignissim suspendisse. Lectus urna duis convallis convallis tellus id interdum velit
                    laoreet. Adipiscing elit pellentesque habitant i tristique senectus et netus. Augue interdum velit euismod in pellentesque massa placerat duis ultricies. Elementum eu facilisis sed odio. Volutpat est velit egestas dui id ornare. Ac
                    odio tempor orci dapibus ultrices in iaculis nunc. Diam ut venenatis tellus in.
                </p>
            </section>
        </div>
    </div>
    <!-- Vision & Mission cards end-->

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
    <script src="js/carousel.js"></script>
</body>

</php>