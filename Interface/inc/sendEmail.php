<?php
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $database = 'pb_tax';

  $conn = mysqli_connect($host,$user,$pass,$database);

  if (!$conn) {
      die('Not connected'.mysqli_connect_error());
  }
  // end of connection
// Replace this with your own email address
$siteOwnersEmail = 'ishimwemustapha2006@gmail.com';


if($_POST) {

    $name = trim(stripslashes($_POST['contactName']));
    $phone = trim(stripslashes($_POST['contactPhone']));
    $email = trim(stripslashes($_POST['contactEmail']));
    $subject = trim(stripslashes($_POST['contactSubject']));
    $contact_message = trim(stripslashes($_POST['contactMessage']));

    // Check Name
    if (strlen($name) < 2) {
        $error['name'] = "Please enter your name.";
    }
    // Check Email
    if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
        $error['email'] = "Please enter a valid email address.";
    }
    // Check Message
    if (strlen($contact_message) < 15) {
        $error['message'] = "Please enter your message. It should have at least 15 characters.";
    }
    // Subject
    if ($subject == '') { $subject = "Contact Form Submission"; }

    $insert = "INSERT INTO comments VALUES('','$name','$email','$phone','$subject','$contact_message')";

    $runSelect = mysqli_query($conn,$insert);

    if ($runSelect) {
        echo "OK";
    }
    else{
        echo "Something went wrong. Please try again.";

    }

    // // Set Message
    // $contact_message = "Email from" . $name .'<br/>' ."Email address" . $email . '<br/>'. "Message" . $contact_message ."This email was sent from your site's contact form"; 


    // // Set From: header
    // $from =  $name . " <" . $email . ">";

    // // Email Headers
    // $headers = "From: " . $from . "\r\n";
    // $headers .= "Reply-To: ". $email . "\r\n";
    // $headers .= "MIME-Version: 1.0\r\n";
    // $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


    //     // ini_set("sendmail_from", $siteOwnersEmail); // for windows server
    //     $mail = mail($siteOwnersEmail, $subject, $contact_message, $headers);

    //     if ($mail) { echo "OK"; }
    //     else { echo "Something went wrong. Please try again."; }
        
    

    // if ($error) {
    //     $response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
    //     $response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
    //     $response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
        
    //     echo $response;

    // } # end if - there was a validation error

}

?>