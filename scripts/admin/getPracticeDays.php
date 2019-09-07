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
$getpracticedays->execute();

// Left column
echo "
    <div class='row2'>

        <div class='columnleft' style='width: 25%'>
            <img src='../images/logo.webp' class='boximage'>
            <img src='../images/logo.webp' class='boximage'>
            <img src='../images/logo.webp' class='boximage'>
        </div>
        
        <div class='columnright' style='width: 75%'>
            <h3 style='color: #251010'>Practice Schedule</h3>

";
$x = 1;

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
            </p>
        </form>
    ";
    $x++;
}

echo "
        <br><br>
        <h3 style='color: #251010'>Upcomming Changes to Weekly Schedule</h3>
        <p class='darktext'><input type='date' name='date1' placeholder='eg. Wednesdays'></p>
        <p class='darktext'>12/01/2019 - Practice Cancelled due to weather</p>
        <p class='darktext'>02/08/2020 - Practice Cancelled due zombie apocolypse</p><br><br>

        <h3 style='color: #251010'>Practice Location</h3>
        <p class='darktext'>Insanity Skate Complex - Madison, Al<br><br>
        <div style='width: 100%'><iframe width='75%' height='400' src='https://maps.google.com/maps?width100%&amp;height=600&amp;hl=en&amp;q=100%20skate%20park%20drive%2C%20madison%2C%20al%2035758+(Insanity%20Complex)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'><a href='https://www.maps.ie/coordinates.html'>gps coordinates finder</a></iframe></div><br>
    </div>
</div>
";

?>