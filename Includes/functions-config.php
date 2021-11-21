<?php

// function emptyInputSignup($name, $email, $password ,$Cpassword){
//     $result;
//     if(empty($name) || empty($email) || empty($password) || empty($Cpassword)){
//         $result = true;
//         return $result;
//     }
//     else{
//         $result = false ;
//         return $result;
//     }
    
// }

// function invalidEmail($email){
//     $result;
//     if(filter_var($email, FILTER_VALIDATE_EMAIL)){
//         $result = true;
//         return $result;
//     }else{
//         $result =false;
//         return $result;
//     }
    

// }

// function pwdMatch($password,$Cpassword){
//     $result;    
//     if($password !== $Cpassword){
//         $result = true;
//         return $result;
//     }else{
//         $result = false;
//         return $result;
//     }
    
// }

/* Checks if the email is already registered*/
function emailExists($conn,$email){
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../Signup.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);

    $resultsdata = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultsdata)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}
/* Creates a new user*/
function  createUser($conn, $name, $email,$accType, $userpassword){

    $sql = "INSERT INTO `users`(`username`, `email`, `accType`, `password`) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../Signup.php?error=stmtFailed");
        exit();
    }
    // $hashedpw = password_hash($userpassword, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$name, $email,$accType, $userpassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signin.php?error=none");
    exit();
}
/* Creates a new course*/
// function createcourse($conn,$coursename,$courseimage,$courseimage_temp,$folder,$courseshortdes,$coursedes,$batch,$price)
// {

//     $sql ="INSERT INTO `courses`(`courseName`, `course_image_info`, `short_description`, `description`, `batch`, `price`) VALUES (?,?,?,?,?,?)";
//     $stmt = mysqli_stmt_init($conn);
//     if(mysqli_stmt_prepare($stmt,$sql)){
//         echo 'Successfully Upload.';
//     }else{
//         echo 'There were erros while uploading the data.';
//     }
//     mysqli_stmt_bind_param($stmt,"ssssss",$coursename, $courseimage, $courseshortdes, $coursedes, $batch, $price);
//     mysqli_stmt_execute($stmt);
    
//     if(move_uploaded_file($courseimage_temp,$folder)){
//         mysqli_stmt_close($stmt);
//         header("location: ../courses.php?error=none");
//         exit();
//     }else{S
//         header("location: ../courses.php?error=imageUploadFailed");
//         exit();
//     }
//     // mysqli_stmt_close($stmt);
//     // header("location: ../courses.php?error=none");
//         exit();

//     // header("location: ../courses.php?error=none");
//     // exit();
// }

function  loginUser($conn,$email,$password){
    $emailexist = emailExists($conn,$email);

    if($emailexist === false){
        header("location:../signin.php?error=wronglogin");
        exit();
    }
    $pwHashed = $emailexist["password"];
    if($password === $pwHashed)
    {
        $checkpw = true;
    }else{
        $checkpw = false;
    }
    
    // password_verify($password, $pwHashed);

    if($checkpw === false){
        header("location:../signin.php?error=wrongpassword");
        exit() ;
        
    }else if($checkpw === true){
        session_start();
        $_SESSION["username"] = $emailexist["username"];
        $_SESSION["useremail"] = $emailexist["email"];
        $_SESSION["accType"] = $emailexist["accType"];
        $_SESSION["uid"] = $emailexist["uId"];

        header("location:../index.php?error=signedin");
        exit() ;
    }
}