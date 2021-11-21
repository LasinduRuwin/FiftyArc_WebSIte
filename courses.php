<?php
    session_start();
?>
<!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>

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
                    <a href="about.php">About</a>
                </li>
                <li>
                    <a href="contact.php">Contact Us</a>
                </li>
                <li>
                    <a class="active-long" href="courses.php">Courses</a>
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
<?php
    require_once "Includes/databaseConn.php";
                    
                    try{
                        $sql= "SELECT `courseID`, `courseName`, `course_image_info`, `short_description` FROM `courses`";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header("location: ../Signup.php?error=stmtFailed");
                            exit();
                        }
                        mysqli_stmt_execute($stmt);
                        $resultsdata = mysqli_stmt_get_result($stmt);
                        $rows= $resultsdata->num_rows;

                    }catch(Exception $e){
                        $error = $e ->getMessage();
                    }
?>

    <!--Courses View -->
    <div class="course-container-main">
        <h1 class="course-heading">
            Available Courses
        </h1>
        <div class="course-container-sub">
            <?php
                if(!$rows)
                {
                    echo "No results found";
                }else{
                    while($courses = mysqli_fetch_assoc($resultsdata))
                    { ?>
                        <!--Single Course Card 1-->
                        <div class="course-card">
                            <div class="course-img">
                                <img src="assets/img/course/<?php echo $courses['course_image_info']; ?>" alt="">
                            </div>
                            <div class="course-title">
                                <h2><?php echo $courses['courseName']; ?></h2>
                            </div>
                            <div class="course-intro">
                                <p>
                                <?php echo $courses['short_description']; ?>
                                </p>
                            </div>
                            <div class="view-more-btn">
                                <a href="course-details.php?course=<?php echo $courses['courseID']; ?>">More</a>
                            </div>
                        </div>
                        <!--Single Course Card End-->
                        <?php
                    }
                    
                };
            ?>
            
            <?php
            mysqli_stmt_close($stmt);
            $conn->close();
            ?>          

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