<?php
/******************************************************************************
* File name:
*   editPerson.php
* Author:
*   Jonathan Carlson
* Description:   
*   This code overwrites the person information in various tables in the 
*   database with the information provided by the use in the profile pop-up.
******************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

echo '<script>window.location.href = "../../pages/A-skaters.php";</script>';

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Set variables and run through security function
if(isset($_POST['person_id']))
    $person_id = test_input($_POST['person_id']);
else    
    echo "<p>Error Loading person_id!</p>";

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

if(isset($_POST['description'])) 
    $description = htmlspecialchars($_POST['description']);
else
    echo "<p>Error Loading description!</p>";

switch($table) {
    case 'skaters':    
        $editPerson = $db->prepare("
        UPDATE skaters SET name='$name', number=$number, DOB='$dob', 
        start='$start', description='$description'
        WHERE person_id=($person_id)");
        break;
    case 'referees':
        $editPerson = $db->prepare("
        UPDATE referees SET name='$name', position='$position', filler='$filler', 
        start='$start', description='$description'
        WHERE person_id=($person_id)");
        break;
    case 'coaches':
        $editPerson = $db->prepare("
        UPDATE coaches SET name='$name', position='$position', filler='$filler', 
        start='$start', description='$description'
        WHERE person_id=($person_id)");
        break;
    case 'board':
        $editPerson = $db->prepare("
        UPDATE board SET name='$name', position='$position', contact='$contact', 
        start='$start', description='$description'
        WHERE person_id=($person_id)");
        break;
}
    
$editPerson->execute();

header("Location: ../../pages/A-skaters.php");
die();	

?>

