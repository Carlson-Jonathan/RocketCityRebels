<?php
/*****************************************************************************
* setschedulechanges.php
* Author:
*   Jonathan Carlson
* Description: 
*   This file sets the user defined schedule changes on the admin schedule
*   page. 
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
if(isset($_POST['day']))
    $day = test_input($_POST['day']);
else
    echo "<p>Error Loading day!</p>";

if(isset($_POST['description']))
    $description = test_input($_POST['description']);
else
    echo "<p>Error Loading description!</p>";

if(isset($_POST['id']))
    $id = test_input($_POST['id']);
else
    echo "<p>Error Loading inc!</p>";

$setchange = $db->prepare("
UPDATE schedulechanges SET day='$day', description='$description' WHERE id=$id");

$setchange->execute();

header("Location: ../../pages/A-schedule.php");
die();	

?>