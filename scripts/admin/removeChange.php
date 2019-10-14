<?php
/*****************************************************************************
* This script removes a schedue change the admin schedule page.
* It also adds changes...
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

if(isset($_POST['id'])) {
    $id = test_input($_POST['id']);
    $change = $db->prepare("DELETE FROM schedulechanges WHERE id = $id;");
} else {
    echo "<p>Error Loading id!</p>";

    $day = test_input($_POST['day']);
    $description = test_input($_POST['description']);
    $change = $db->prepare("INSERT INTO schedulechanges (day, description)
    VALUES ('$day', '$description');");
}
    
$change->execute();

echo "day = $day<br>description = $description";
                           
header("Location: ../../pages/A-schedule.php");
die();	

?>