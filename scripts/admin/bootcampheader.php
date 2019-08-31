<?php
/******************************************************************************
* bootcampheader.php
* Author: 
*   Jonathan Carlson
* Description:
*   This file is called in the header just under the navigation bar. This code
*   displays and animates the "BOOT CAMP" bar under the nagivation menu. It 
*   also calls some JavaScript files to determine the dates of enrollment 
*   season so the site know when the banner, as well as other content on the
*   enlist page, should be displayed.
******************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

$getBootCamp = $db->prepare("SELECT * FROM bootcamp");
$getBootCamp->execute();

while($row = $getBootCamp->fetch(PDO::FETCH_ASSOC)) {
    $dbBegin = $row['begin'];
    $dbFinish = $row['finish'];

    echo "
    <!-Here I am using some input elements as buffers to pass PHP variables
    into JavaScript. A cheater way to do it, but it works!->
    <input type='date' value='$dbBegin' id='begin' style='display: none'>
    <input type='date' value='$dbFinish' id='finish' style='display: none'>

    <a href='../pages/enlist.php' style='text-decoration: none'>
        <div id='bootcampbar'>
            <script src='../scripts/bootcamp.js'></script>
            <script>setDates();</script>

            <div class='neon'>
                <span class='text' data-text='_boot_camp_'>
                    _boot_camp_
                </span>
                <span class='gradient'></span>
                <span class='spotlight'></span>
            </div>
            <p style='color:#aad400; font-size: 24px'>
                Enrollment Season Now Open!
            </p>
            <p style='color:#aad400; font-size: 13px'>
                Click here to find out how to join the Rocket City Rebels
            </p>
        </div>
    </a>
    <script>
        adjustDisplay();
        startHeight();
    </script>
    ";
}
?> 