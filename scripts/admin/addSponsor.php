<?php
/*****************************************************************************
* addSponsors
* Author:
*   Jonathan Carlson
* Decription:
*   This script adds a sponsor to the 'sponsors' tables in the database. 
*   Used in A-more (administrative 'more' page).
*****************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

echo '<script>window.location.href = "../../pages/A-misc.php";</script>';

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Set variables and run through security function
    if(isset($_POST['name']))
        $name = test_input($_POST['name']);
    else
        echo "<p>Error Loading name!</p>";

    if(isset($_POST['logo']))
        $logo = test_input($_POST['logo']);
    else
        echo "<p>Error Loading logo!</p>";

// Add or delete sponsor
if($_GET['remove']) {
    $removeSponsor = $db->prepare("DELETE FROM sponsors
    WHERE name = '$name'");
    $removeSponsor->execute();
} else {
    $addSponsor = $db->prepare("INSERT INTO sponsors (name, logo)
        VALUES ('$name', '$logo')");
    $addSponsor->execute();
}

echo "You are trying to remove $name.";
echo "Remove is set to " . $_GET['remove'];

header("Location: ../../pages/A-misc.php");
die();	

?>