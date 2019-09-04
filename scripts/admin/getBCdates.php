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
$getBootCamp->execute();

$row = $getBootCamp->fetch(PDO::FETCH_ASSOC);
$dbBegin = $row['begin'];
$dbFinish = $row['finish'];
    
echo "
    <h2>Boot Camp Enrollment</h2>
    <div class='row2'>
        <p class='darktext' style='font-size: 18px'>    
            Enter the first and last days of the boot camp enrollment
            season in the fields below. If today's date is within this range,
            a 'Boot Camp' advertisement bar will appear under the navigation
            menu and new content will appear on the 'enlist' page.
        </p><br>
        <form method='POST' action='../scripts/admin/setBCdates.php'>
            <p class='darktext'>First Enrollment Date: <input type='date' name='begin' value='$dbBegin'></p><br>
            <p class='darktext'>Last Enrollment Date: <input type='date' name='finish' value='$dbFinish'></p><br>
            <input type='submit' value='Save Dates' class='save'>
        </form>
    </div>
";

?>