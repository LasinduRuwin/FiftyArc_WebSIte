<?php

if (isset($_POST["submit"])){

    $name = $_POST["Fname"];
    $email = $_POST["email"];
    $userpassword = $_POST["password"];
    $Cpassword = $_POST["Cpassword"];
    $accType="student";

    require_once 'databaseConn.php';
    require_once 'functions-config.php';

    // if(emptyInputSignup($name, $email, $userpassword ,$Cpassword)!== false){
    //     header("location: ../Signup.php?error=emptyinput");
    //     exit();
    // }
    // if(invalidEmail($email)!== false){
    //     header("location: ../Signup.php?error=invalidEmail");
    //     exit();
    // }
    // if(pwdMatch($userpassword,$Cpassword)!== false){
    //     header("location: ../Signup.php?error=passwordsdontmatch");
    //     exit();
    // }
    
    if(emailExists($conn,$email)!== false){
        header("location: ../Signup.php?error=emailalreadyExists");
        exit();
    }

    createUser($conn, $name, $email,$accType, $userpassword);


}else{
    header("location: ../Signup.php");
    exit();
}; 