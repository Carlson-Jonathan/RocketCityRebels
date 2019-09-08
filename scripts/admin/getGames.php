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
    
    echo 
        // Display events and allow for editing
        "<form method='POST' action='../scripts/admin/setGames.php'>
            <input value='$id' name='id' type='hidden'>
            <input type='date' value='$day' name='day' class='darktext' required>  
            <input type='text' value='$title' name='title' class='darktext'
            style='width: 60%' required><br><br>
            <textarea cols='65' rows='4' name='description'
            class='darktext' required>$description</textarea>";
            
    echo 
        // Save Button
            "<div class='schedulesave'>
                <input type='hidden' value='true' name='save'>
                <input type='submit' value='Save' class='save' 
                style='font-size: 14px'>
            </div>
        </form>";
        
    echo
        // Delete Button
        "<form method='POST' action='../scripts/admin/setGames.php'>
            <div class='scheduledelete'>
                <input type='submit' value='Delete' class='save' style='background-color: darkred; font-size: 14px; color: white'>
                <input type='hidden' value='true' name='delete'>
                <input type='hidden' value='$id' name='id'>
            </div>
        </form><br><br><br><br>";
        
    echo     
        // Divider Line
        "<div style='border-bottom: solid #aad400 1px; width: 88%; 
            margin: auto'></div><br><br>
    ";
}

echo 
    // Create New Event
    "<form method='POST' action='../scripts/admin/setGames.php'>
        <input type='date' name='day' class='darktext' required>  
        <input type='text' name='title' class='darktext' style='width: 60%'
        required><br><br>
        <textarea cols='65' rows='4' name='description'
        class='darktext' placeholder='Create a new event here' required></textarea>";

echo 
    // New Event Button
        "<div style='text-align: center'>
            <input type='submit' value='New Event' class='save' 
            style='font-size: 14px'>
            <input type='hidden' value='true' name='create'>
        </div>
    </form>";
?>