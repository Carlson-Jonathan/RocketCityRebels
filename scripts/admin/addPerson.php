<?php
/*****************************************************************************
* This script adds a person to one of the tables in the database.
***************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

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

    if(isset($_POST['number']))
        $number = test_input($_POST['number']);
    else
        echo "<p>Error Loading number!</p>";

    if(isset($_POST['dob']))
        $dob = test_input($_POST['dob']);
    else
        echo "<p>Error Loading dob!</p>";

    if(isset($_POST['start']))
        $start = test_input($_POST['start']);
    else
        echo "<p>Error Loading start!</p>";

    if(isset($_POST['image'])) 
        $image = htmlspecialchars($_POST['image']);
    else
        echo "<p>Error Loading image!</p>";

    if(isset($_POST['table'])) 
        $table = htmlspecialchars($_POST['table']);
    else
        echo "<p>Error Loading table!</p>";

    if(isset($_POST['position'])) 
        $position = htmlspecialchars($_POST['position']);
    else
        echo "<p>Error Loading position!</p>";

    if(isset($_POST['filler'])) 
        $filler = htmlspecialchars($_POST['filler']);
    else
        echo "<p>Error Loading filler!</p>";

    if(isset($_POST['contact'])) 
        $contact = htmlspecialchars($_POST['contact']);
    else
        echo "<p>Error Loading contact!</p>";

// Test output
echo "
    name = $name<br>
    number = $number<br>
    dob = $dob<br>
    start = $start<br>
    image = $image<br>
    table = $table<br>
    position = $position<br>
    filler = $filler<br>
";
    
// Determines which table to query
switch($table) {
    case 'skaters':    
        $addPerson = $db->prepare("
        INSERT INTO skaters (name, number, DOB, start, image)
        VALUES ('$name', $number, '$dob', '$start', '$image')");
        break;
    case 'referees':
        $addPerson = $db->prepare("
        INSERT INTO referees (name, position, start, filler, image)
        VALUES ('$name', '$position', '$start', '$filler', '$image')");
        break;
    case 'coaches':
        $addPerson = $db->prepare("
        INSERT INTO coaches (name, position, start, filler, image)
        VALUES ('$name', '$position', '$start', '$filler', '$image')");
        break;
    case 'board':
        $addPerson = $db->prepare("
        INSERT INTO board (name, position, start, contact, image)
        VALUES ('$name', '$position', '$start', '$contact', '$image')");
        break;
}
    
$addPerson->execute();

header("Location: ../../pages/admin.php");
die();	

?>