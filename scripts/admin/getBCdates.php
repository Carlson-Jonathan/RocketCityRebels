<?php
/*****************************************************************************
* getBCdates.php
* Author:
*   Jonathan Carlson
* Description: 
*   This file retrives the bootcamp dates from the database and sets
*   them on the website, which can allow other content to be displayed if BC
*   is in season.
*****************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

$getBootCamp = $db->prepare("SELECT * FROM bootcamp");
$getEnrollment = $db->prepare("SELECT * FROM enroll");

$getBootCamp->execute();
$getEnrollment->execute();

$BC = $getBootCamp->fetch(PDO::FETCH_ASSOC);
$ENR = $getEnrollment->fetch(PDO::FETCH_ASSOC);

$dbBegin = $BC['begin'];
$dbFinish = $BC['finish'];
$url = $ENR['url'];
    
echo "
    <h2>Boot Camp Enrollment</h2>
    <div class='row2'>
    <h3>Boot Camp Enrollment Dates</h3>
    <p class='darktext' style='font-size: 18px'>    
        Enter the first and last days of the boot camp enrollment
        season in the fields below. If today's date is within this range,
        a 'Boot Camp' advertisement bar will appear under the navigation
        menu and new content will appear on the 'enlist' page.
    </p><br>
    <form method='POST' action='../scripts/admin/setBCdates.php'>
        <p class='darktext'>First Enrollment Date: <input type='date' name='begin' value='$dbBegin'></p><br>
        <p class='darktext'>Last Enrollment Date: <input type='date' name='finish' value='$dbFinish'></p>
        <input type='submit' value='Save Dates' class='save'>
    </form><br><br>
    
    <h3>Boot Camp Enrollment Form URL</h3><br>
    <p>Paste your enrollment form address link here:</p>
    <form method='POST' action='../scripts/admin/setEnrollmentURL.php'>
        <input type='text' name='url' value='$url' style='width: 60%'>
        <input type='submit' value='Save URL' class='save'>
    </form>
        
    </div>
";

?>