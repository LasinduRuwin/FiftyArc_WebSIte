<?php

// Contact Us mail function
    $name = $_POST['name'];
    $visitorMail = $_POST['email'];
    $message = $_POST['message'];

    $senderEmail = 'lasinduruwin.g@gmail.com';
    $subject = "New Form Submission";
    $mailBody = " Name : $name. \n".
                    " Email : $visitorMail.\n".
                        "Message :\n $message.\n";


   $to = "lasinduruwine.ezio@gmail.com";
   $headers = "From : $senderEmail \r\n";
   $headers .= "Reply-TO : $visitorMail \r\n";
   

   if(mail($to,$subject,$mailBody,$headers))
   {
       echo "<script>alert('Message Sent Successfuly'); window.location='Home.html#contact-us' </script>" ;
       header("Location: index.php");
   }
   else{
       echo "Somethig went wrong with the email";
   }
     
?>