<?php
/*****************************************************************************
* setEnrollmentURL.php
* Author:
*   Jonathan Carlson
* Description: 
*   This script allows the user to change the URL address that links to the 
*   boot camp enrollment form.
*****************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Set variables
if(isset($_POST['url']))
    $url = test_input($_POST['url']);
else
    echo "<p>Error Loading url!</p>";
  
// Edit item
if(isset($_POST['url'])) {
    $setURL = $db->prepare("UPDATE enroll SET url='$url' WHERE id = 1");
    $setURL->execute();
}

header("Location: ../../pages/A-misc.php");
die();	
?>