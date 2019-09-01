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

while($row = $getBootCamp->fetch(PDO::FETCH_ASSOC)) {
    $dbBegin = $row['begin'];
    $dbFinish = $row['finish'];
    
    echo "
        <h2>Add/Remove Sponsors</h2>
        <div class='row'>
            <p class='lighttext' style='font-size: 18px'>    
                Below is a list of the current sponsors and their logo image
                file name. As with the skaters page, you can upload a new
                sponsor's logo to the appropriate web folder and add them to
                the below list. Their logo will then appear in the footer on
                each page as well as be included in the 'sponsors' page.
            </p><br><br>
            <p class='lighttext' style='text-align: center'>Functionality comming soon...</p>
        </div>
    ";
}

?>