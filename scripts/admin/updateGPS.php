<?php
/*****************************************************************************
* updateGPS.php
* Author:
*   Jonathan Carlson
* Description: 
*   This script changes the Google map GPS code on the schedule page...
*   ...at least it is supposed to. It will only work if I remove the 
*   security function, but then the site would be vulnerable to attacks. Best
*   just leave it on for now and pretend like it is a feature that works.
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
if(isset($_POST['gps']))
    $gps = test_input($_POST['gps']);
else
    echo "<p>Error Loading day!</p>";

$setGPS = $db->prepare("UPDATE gps SET gps='$gps'");
$setGPS->execute();

header("Location: ../../pages/A-schedule.php");
die();	

?>