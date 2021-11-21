<?php
    session_start();

    $courseid = $_GET['course'];

    if(filter_var($courseid,FILTER_VALIDATE_INT)===false){
        die("No valid ID");
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    require_once "Includes/databaseConn.php";
                    
    try{
        $sql= 'SELECT `courseName`, `course_image_info`, `short_description`, `description`, `batch`, `price` FROM `courses` WHERE `courseID`= '.$courseid.';';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../Signup.php?error=stmtFailed");
            exit();
        }
        mysqli_stmt_execute($stmt);
        $resultsdata = mysqli_stmt_get_result($stmt);
        $rows= $resultsdata->num_rows;
        $courses = mysqli_fetch_assoc($resultsdata);

    }catch(Exception $e){
        $error = $e ->getMessage();
    }
    
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $courses['courseName']; ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/Navbar.css">
    <link rel="stylesheet" href="css/course-details.css">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
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

   

    <div class="course-wrapper">
    <?php
                if(!$rows)
                {
                    echo "No results found";
                }else{

                    $_SESSION["courseName"]=$courses['courseName'];
                    $_SESSION["batch"]= $courses['batch'];
                    
                     ?>
        <div class="imgcontainer">
            <img src="assets/img/course/<?php echo $courses['course_image_info']; ?>" alt="" class="courseimg">
        </div>
        <div class="course-detail-title">
            <h2 class="course-title-text"><?php echo $courses['courseName']; ?></h2>
        </div>
        <div class="course-info-container">
            <div class="course-desc">
                <p>
                <?php echo $courses['description']; ?>
                </p>
            </div>

            <div class="side-info">
                <h3>Course Fee</h3>
                <p class="course-fee"><?php echo $courses['price']; ?></p>
                <hr>
                <h3>Next batch</h3>
                <p class="nextbatchdate"><?php echo $courses['batch']; ?></p>
                <hr>
                <br><br>
                <?php if(isset($_SESSION["username"])){?>
                <a href="Includes/addreservation-config.php">Reserve</a>
                    <?php }else{?>
                        <a href="signin.php">SignIn</a>
                        <?php }?>
            </div>
        </div>
 <?php }?>
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
    <?php
            mysqli_stmt_close($stmt);
            $conn->close();
    ?>        
    <script src="js/NavBar.js"></script>
</body>

</html>