<?php
/*****************************************************************************
* This script removes a person from one of the tables on the database using 
* the serial ID received from the POST method.
*****************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

echo '<script>window.location.href = "../../pages/A-skaters.php";</script>';

if(isset($_GET['person_id']))
    $person_id = htmlspecialchars($_GET['person_id']);
else
    echo "<p>Error Loading person_id!</p>";

if(isset($_POST['table'])) 
    $table = htmlspecialchars($_POST['table']);
else
    echo "<p>Error Loading table!</p>";

$removePerson = $db->prepare("DELETE FROM $table WHERE person_id = $person_id;");
$removePerson->execute();

header("Location: ../../pages/A-skaters.php");
die();	

?>