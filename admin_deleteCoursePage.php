<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Navbar.css">
    <link rel="stylesheet" href="css/admin_removeCourse.css">
</head>
<?php
    require_once "Includes/databaseConn.php";
                    
                    try{
                        $sql= "SELECT `courseID` ,`courseName` ,`course_image_info` ,`batch` FROM `courses`";
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

                <div class="main-container">
                
                   <div class="Remove-courses" >
                   <h2>Remove Courses</h2>
                   <div class="scrollview">
                   <?php
                if(!$rows)
                {
                    echo "You Don't have Courses Entered";
                }else{
                    while($reservations = mysqli_fetch_assoc($resultsdata))
                    { ?>
                       <div class="wrapper">
                           <img src="assets/img/course/<?php echo $reservations["course_image_info"]?> " alt="">
                           <div class="secondwrapper">
                               <h4><?php echo $reservations["courseName"];?></h4>
                            <p><?php echo $reservations["batch"];?></p> 
                            
                            <a href="Includes/admin-removecourse.php?course=<?php echo $reservations["courseID"] ?>" class="removebtn">Remove</a> 
                        </div>
                                                      
                        </div>
                        <?php }};?>
                </div>
                       
                   </div>
                </div>


    <script src="js/NavBar.js"></script>
</body>
</html>