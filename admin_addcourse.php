<?php
    session_start();
?>
<!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="css/Navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/test.css">
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

    <!-- HTML Form -->

    <div class="testbox">
      <form action="Includes/admin_config.php" method="POST" enctype = "multipart/form-data">
        <div class="banner">
          <h1> New Courses Add Here !</h1>
        </div>
        <div class="contact-item">
          <div class="item">
            <p>Course Name</p>
            <input type="text" id="courseName" name="courseName" required/>
          </div>
          <div class="item">
            <p>Course Icon</p>
            <input type="file" id="course_image_info" name="course_image_info" value=""/>
          </div>
        </div>
        <div class="item">
          <p>Short Description</p>
          <textarea rows="3" id="short_description" name="short_description" required></textarea>
        </div>
        <div class="item">
          <p>Full Description of course</p>
          <textarea rows="3" id="description" name="description" required></textarea>
        </div>
        <div class="contact-item">
          <div class="item">
            <p>Batch</p>
            <input type="text" id="batch" name="batch" required/>
          </div>
          <div class="item">
            <p>Price</p>
            <input type="text" id="price" name="price" required/>
          </div>
        </div>
        <div class="btn-block">
        <button type="submit" name="upload"> submit</button>
        </div>
      </form>
    </div>
    </form>

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