<?php
/*****************************************************************************
* setBCdates.php
* Author:
*   Jonathan Carlson
* Description: 
*   This file contains the code that allows the user to change the bootcamp
*   enrollment season dates on the administrative site.
*****************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Set variables and run through security function
if(isset($_POST['begin']))
    $begin = test_input($_POST['begin']);
else
    echo "<p>Error Loading start date!</p>";

if(isset($_POST['finish']))
    $finish = test_input($_POST['finish']);
else
    echo "<p>Error Loading end date!</p>";

$setBootCamp = $db->prepare("
UPDATE bootcamp SET begin='$begin', finish='$finish'
WHERE id=1");

$setBootCamp->execute();

header("Location: ../../pages/A-enlist.php");
die();	

?>