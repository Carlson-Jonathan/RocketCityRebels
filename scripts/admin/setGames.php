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

echo '<script>window.location.href = "../../pages/A-schedule.php";</script>';

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Set variables
if(isset($_POST['id']))
    $id = test_input($_POST['id']);
else
    echo "<p>Error Loading id!</p>";

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
    
// Remove item 
if(isset($_POST['delete'])) {
    $deleteGame = $db->prepare("DELETE FROM games WHERE id = $id");
    $deleteGame->execute();
}
    
// Edit item
if(isset($_POST['save'])) {
    $setGames = $db->prepare("UPDATE games SET day='$day',
    title='$title', description='$description' WHERE id = $id");
    $setGames->execute();
}
    
// Create item
if(isset($_POST['create'])) {
    $createGame = $db->prepare("INSERT INTO games (day, title, description)
    VALUES ('$day', '$title', '$description')");
    $createGame->execute();
}

header("Location: ../../pages/A-schedule.php");
die();	
?>