<?php 
session_start(); 

if(isset($_POST["upload"])){

	$coursename 		= $_POST['courseName'];
	$courseimage 		= $_FILES['course_image_info']['name'];
	$courseimage_temp   = $_FILES['course_image_info']['tmp_name'];
	$folder				= "../assets/img/course/".$courseimage;
	$courseshortdes 	= $_POST['short_description'];
	$coursedes	        = $_POST['description'];
	$batch 		        = $_POST['batch'];
    $price              = $_POST['price'].' LKR';


	require_once 'databaseConn.php';


// 	createcourse($conn,$coursename,$courseimage,$courseimage_temp,$folder,$courseshortdes,$coursedes,$batch,$price);

// 	function createcourse($conn,$coursename,$courseimage,$courseimage_temp,$folder,$courseshortdes,$coursedes,$batch,$price)
// {

    $sql ="INSERT INTO `courses`(`courseName`, `course_image_info`, `short_description`, `description`, `batch`, `price`) VALUES (?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
        echo 'Successfully Upload.';
    }else{
        echo 'There were erros while uploading the data.';
    }
    mysqli_stmt_bind_param($stmt,"ssssss",$coursename, $courseimage, $courseshortdes, $coursedes, $batch, $price);
    mysqli_stmt_execute($stmt);
    
    if(move_uploaded_file($courseimage_temp,$folder)){       
        header("location: ../courses.php?error=none");
        exit();
    }else{
        
        // header("location: ../courses.php?error=imageUploadFailed");
        echo $_FILES['course_image_info']['error'].'<br>';
        echo $_FILES['course_image_info']['tmp_name'].'<br>';
        exit();
    }
    // mysqli_stmt_close($stmt);
    // header("location: ../courses.php?error=none");

    // header("location: ../courses.php?error=none");
    // exit();
}
// }
else{
	header("location: ../signin.php");
    exit();
}