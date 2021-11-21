<?php
session_start();

require_once 'databaseConn.php';

if(isset($_SESSION["username"]))
{
    $coursename= $_SESSION["courseName"];
    $batch= $_SESSION["batch"];
    //echo $_SESSION["accType"];
    $uid= $_SESSION["uid"];
    $username= $_SESSION["username"];
    //echo $_SESSION["useremail"];
    
    $sql = "INSERT INTO `reservations`(`userID`, `username`, `courseName`, `batch`) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../courses.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssss",$uid, $username,$coursename, $batch);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../Thankyou.php?Reservation_Success!");
    exit();
}else{

    header("location: ../signin.php");
}

// header("location: ../courses.php");
// exit();