<?php 
session_start(); 

if (isset($_POST["submit"])){

    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'databaseConn.php';
    require_once 'functions-config.php';


    loginUser($conn,$email,$password);


}else{
    header("location: ../signin.php");
    exit();
}
