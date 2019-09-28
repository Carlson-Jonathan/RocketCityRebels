<?php session_start();
/******************************************************************************
* contactForm.php
* Author:
*   Jonathan Carlson
* Description:
*   This is the server-side code that enables the contact form to send emails.
******************************************************************************/
// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = test_input($_POST['name']);
$email = test_input($_POST['email']);
$phone = test_input($_POST['phone']);
$message = test_input($_POST['message']);
$message = wordwrap($message, 70, "\r\n");

$formcontent=" From: $name \n Email: $email \n Phone: $phone \n Message: $message";

$recipient = "rocketcityrebels256@gmail.com";
//$recipient = "JonathanCarlson3712@Hotmail.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";

$_SESSION['contactsent'] = true;
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");

header("Location: ../../pages/more.php");
die();

?>