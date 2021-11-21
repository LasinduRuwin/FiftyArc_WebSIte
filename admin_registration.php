<?php
session_start();
?>
<!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel- Admin Registration</title>
    
    <link rel="stylesheet" href="css/Navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" 
    integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/admin_register.css">
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
</body>
    <!-- Top Navigation bar End -->
    <body2>
    <div class="main-block">
      <h1>Registration</h1>
      <form action="/Includes/adminreg_config.php" method="POST">
        <hr>
        <label id="icon" for="name"><i class="fas fa-envelope"></i></label>
        <input type="text" name="email" id="email" placeholder="Email" required/>
        <label id="icon" for="name"><i class="fas fa-user"></i></label>
        <input type="text" name="name" id="name" placeholder="Name" required/>
        <label id="icon" for="name"><i class="fas fa-unlock-alt"></i></label>
        <input type="password" name="password" id="password" placeholder="Password" required/>
        <hr>
        <div class="btn-block">
         
          <button type="submit" name = "submit"href="/">Submit</button>
        </div>
      </form>
    </div>
    </body2>
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