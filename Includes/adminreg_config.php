<?php

if (isset($_POST["submit"])){

    $email = $_POST["email"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $accType="administrator";

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
        header("location: ../admin.php?error=emailalreadyExists");
        exit();
    }

    createUser($conn, $name,$email,$accType, $password);


}else{
    header("location: ../index.php");
    exit();
}; 