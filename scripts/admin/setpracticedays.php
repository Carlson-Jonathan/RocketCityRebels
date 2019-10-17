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

echo '<script>window.location.href = "../../pages/A-schedule.php";</script>';

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Set variables and run through security function
if(isset($_POST['day']))
    $day = test_input($_POST['day']);
else
    echo "<p>Error Loading day!</p>";

if(isset($_POST['begin']))
    $begin = test_input($_POST['begin']);
else
    echo "<p>Error Loading begin!</p>";

if(isset($_POST['stop']))
    $stop = test_input($_POST['stop']);
else
    echo "<p>Error Loading stop!</p>";

if(isset($_POST['inc']))
    $inc = test_input($_POST['inc']);
else
    echo "<p>Error Loading inc!</p>";

$setdays = $db->prepare("
UPDATE practicedays SET day='$day', begin='$begin', stop='$stop'
WHERE id=$inc");

$setdays->execute();

header("Location: ../../pages/A-schedule.php");
die();	

?>