<?php
/*****************************************************************************
* setGames.php
* Author:
*   Jonathan Carlson
* Description: 
*   This scripts gets and sets the games and events from the games table and
*   allows the user to make changes.
*****************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Set variables and run through security function
if(isset($_POST['day']))
    $day = test_input($_POST['day']);
else
    echo "<p>Error Loading day!</p>";

if(isset($_POST['title']))
    $title = test_input($_POST['title']);
else
    echo "<p>Error Loading title!</p>";

if(isset($_POST['description']))
    $description = test_input($_POST['description']);
else
    echo "<p>Error Loading description!</p>";

if(isset($_POST['id']))
    $id = test_input($_POST['id']);
else
    echo "<p>Error Loading id!</p>";

$setGames = $db->prepare("UPDATE games SET day='$day',
title='$title', description='$description' WHERE id = $id");
$setGames->execute();

header("Location: ../../pages/A-schedule.php");
die();	

?>