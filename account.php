<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/Navbar.css">
    <link rel="stylesheet" href="css/account.css">
</head>
<?php
    require_once "Includes/databaseConn.php";
                    
                    try{
                        $sql= "SELECT `res_id`, `userID`, `username`, `courseName`, `batch` FROM `reservations` WHERE `userID` =".$_SESSION["uid"]."";
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
                    <a  href="index.php">Home</a>
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
                            echo "<li><a class='active' href='account.php'>Account</a></li><li><a href='Includes/logout-config.php'>Logout</a></li>";
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
                    <div class="personal-inf">
                        <h2>Personal Information</h2>
                    <div class="field">
                        <label for="fullname">Full Name</label>
                        <p><?php echo $_SESSION["username"];?></p>
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <p><?php echo $_SESSION["useremail"];?></p>
                    </div>
                    </div>
                   <hr>
                   <div class="Reserved-courses">
                       <h2>Reserved Courses</h2>
                       <?php
                if(!$rows)
                {
                    echo "You haven't Registerd to any course";
                }else{
                    while($reservations = mysqli_fetch_assoc($resultsdata))
                    { ?>
                       <div class="Reservation">
                            <label for="course-name"><?php echo $reservations["courseName"];?></label>
                            <p><?php echo $reservations["batch"];?></p>                            
                        </div>
                        <?php }};?>
                   </div>
                </div>


    <script src="js/NavBar.js"></script>
</body>
</html>