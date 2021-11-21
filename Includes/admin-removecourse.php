<?php
session_start();

if(isset($_GET['course'])){

    require_once "databaseConn.php";
                    
    try{
        $sql= "DELETE FROM `courses` WHERE `courseID`= ".$_GET['course']."";
       

        if (mysqli_query($conn, $sql)) {
            header("location: ../admin_deleteCoursePage.php?msg=SuccessfullyDeleted");
            exit();
          } else {
            header("location: ../admin_deleteCoursePage.php?error=". mysqli_error($conn)."");
            exit();
            // echo "Error deleting record: " . mysqli_error($conn);
          }
          
          mysqli_close($conn);
       

    }catch(Exception $e){
        $error = $e ->getMessage();
    }
}