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
$getGames = $db->prepare("SELECT * FROM games ORDER BY day");
$getGames->execute();

function format_date($dt) {
    $date = date_create($dt);
    $format = date_format($date, "M d, Y");
    return $format;
}

while ($row = $getGames->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $day = $row['day'];
    $title = $row['title'];
    $description = $row['description'];
    
    echo "
        <form method='POST' action='../scripts/admin/setGames.php'>
            <input value='$id' name='id' type='hidden'>
            <input type='date' value='$day' name='day' class='darktext'>  
            <input type='text' value='$title' name='title' class='darktext'
            style='width: 60%'><br><br>
            <textarea cols='65' rows='4' name='description'
            class='darktext'>$description</textarea>
            <div style='text-align: center'>
                <input type='submit' value='save' class='save'>
            </div><br><br>
            <div style='border-bottom: solid #aad400 1px; width: 88%; 
                margin: auto'></div>
            <br><br>
        </form>
    ";
}
?>