<?php
/*****************************************************************************
* getPracticeDays.php
* Author:
*   Jonathan Carlson
* Description: 
*   This file sets the HTML content of "Weekly Rhythm" section on the admin
*   page and allows the user to update the practice days and times.
*****************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

$getpracticedays = $db->prepare("SELECT * FROM practicedays ORDER BY id");
$getGPS = $db->prepare("SELECT * FROM gps");
$getSC = $db->prepare("SELECT * FROM schedulechanges ORDER BY id");

$getpracticedays->execute();
$getGPS->execute();
$getSC->execute();
$x = 1;

echo "
    <div class='row2'>
    <h3 style='color: #251010'>Practice Schedule</h3>
";

/******************************************************************************
* Get and set weekly practice days  
******************************************************************************/
while ($row = $getpracticedays->fetch(PDO::FETCH_ASSOC)) {
    $day = $row['day'];
    $begin = $row['begin'];
    $stop = $row['stop'];

    echo "
        <form method='POST' action='../scripts/admin/setpracticedays.php'>
            <p class='darktext'>
                <input type='text' name='day' placeholder='eg. Mondays' value='$day' style='width: 130px'>
                from
                <input type='text' name='begin' value='$begin' style='width: 100px'> 
                to 
                <input type='text' name='stop' value='$stop' style='width: 100px'>
                <input type='submit' value='Save' class='save' style='font-size: 14px; padding: 0 5px'>
                <input type='hidden' name='inc' value='$x'>
            </p><br><br>
        </form>
    ";
    $x++;
}

/******************************************************************************
* Get and set weekly schedule changes  
******************************************************************************/
echo "
    <div class='line'></div><br>
    <h3 style='color: #251010'>Upcomming Changes to Weekly Schedule</h3><br>
        <table>
            <tr>
                <th style='width: 40px; margin: 0 10px'></th>
                <th>Date</th>
                <th style='width: 100%'>Event Description</th>
                <th style='width: 50px'><th>
            </tr>
";

while ($row = $getSC->fetch(PDO::FETCH_ASSOC)) {
    $day = $row['day'];
    $description = $row['description'];
    $id = $row['id'];

    echo "
        <tr class='lighttext'>

        <!-- Delete Button -->
        <td style='width: 40px'>
        <form method='POST' 
                action='../scripts/admin/removeChange.php'>
            <input type='submit' class='delete' value='X'></td>
            <input type='hidden' name='id' value='$id'>
        </form></td>

        <!-- Edit Schedule Changes -->
        <form method='POST' action='../scripts/admin/setschedulechanges.php'>
        <td>
            <input type='date' name='day' value='$day' style='width: 130px; padding: 0'>
        </td>
        <td style='width: 100%; margin: 0 10px'>
            <input type='text' name='description' value='$description' style='width: 95%; margin-left: 10px'>
        </td>
        <td style='width: 50px'>
            <input type='submit' value='Save' class='save' style='font-size: 14px; padding: 0 5px'>
        </td>
            <input type='hidden' name='id' value='$id'>
        </form>
    ";
}

echo "
    <!-- Add Schedule Changes -->
    <form method='POST' action='../scripts/admin/removeChange.php'>
    <tr>
        <td>
            <input type='submit' value='+' class='delete' style='background-color: #aad400'></td>
        <td>
            <input type='date' name='day' style='width: 130px; padding: 0'>
        </td>
        <td style='width: 100%; margin: 0 10px'>
            <input type='text' name='description' style='width: 95%; margin-left: 10px'>
        </td>
        <td style='width: 50px'>
        </td>
    </tr>
    </form>                
</table>

<div class='line'></div><br>
";

/******************************************************************************
* Change practice location 
******************************************************************************/
echo "
    <div class='phonehide'>
    <h3 style='color: #251010'>Practice Location</h3>
";

$row = $getGPS->fetch(PDO::FETCH_ASSOC); 
$gps = $row['gps'];
$broken = "The feature you are trying to use does not currently function. This
was intentional. I, the web designer, could make it work as seen here, but this
would require me to disable a key security feature that prevents cross-site
scripting attacks (XSS) and SQL injections. If you don't know what that is, 
I assure you, it is bad. You would rather not have this feature than have a
gaping hole in this website's security!";

echo "
    <script>var broken = $broken;</script>
    <p class='darktext'>The box below contains the code needed to display the 
    Google map image. You can obtain this code by visiting 
    <a href='https://www.maps.ie/create-google-map/'>
    https://www.maps.ie/create-google-map/</a> and entering 
    the address for Insanity Skate Park or whatever roller rink
    the rebels may move to in the future. Simply paste the new 
    code into this box and click 'Update GPS' to get a new map
    image.</p><br>
    
    <form method='POST' onsubmit='alert(&quot The feature you are trying to use does not currently function. This was intentional. I, the web designer, could make it work as seen here, but this would require me to disable a key security feature that prevents cross-site scripting attacks (XSS) and SQL injections. If you dont know what that is, I assure you, it is bad. You would rather not have this feature than have a gaping hole in this websites security! &quot)'> 
        <div style='text-align: center'><textarea name='gps' placeholder='$gps' cols='60' rows='8'></textarea><br>
        <input type='submit' value='Update GPS' class='save'>
        </div><br>
    </form>";

echo "
    $gps
    </div>
    </div>
    </div>
";
?>