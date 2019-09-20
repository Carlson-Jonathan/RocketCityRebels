<?php
/*****************************************************************************
* This script removes an item from one of the tables on the database using 
* the serial ID received from the POST method.
*****************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

if(isset($_GET['item_id']))
    $item_id = htmlspecialchars($_GET['item_id']);
else
    echo "<p>Error Loading item_id!</p>";

if(isset($_POST['table'])) 
    $table = htmlspecialchars($_POST['table']);
else
    echo "<p>Error Loading table!</p>";

$removeItem = $db->prepare("DELETE FROM $table WHERE item_id = $item_id;");
$removeItem->execute();

header("Location: ../../pages/A-store.php");
die();	

?>