<?php
/******************************************************************************
* File name:
*   editItem.php
* Author:
*   Jonathan Carlson, Kyle Kadous
* Description:   
*   This code overwrites the item information in various tables in the 
*   database with the information provided by the use in the details pop-up.
******************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Set variables and run through security function
if(isset($_POST['item_id']))
    $item_id = test_input($_POST['item_id']);
else    
    echo "<p>Error Loading item_id!</p>";

if(isset($_POST['name']))
    $name = test_input($_POST['name']);
else
    echo "<p>Error Loading name!</p>";

if(isset($_POST['price']))
    $price = test_input($_POST['price']);
else
    echo "<p>Error Loading price!</p>";

if(isset($_POST['image'])) 
    $image = htmlspecialchars($_POST['image']);
else
    echo "<p>Error Loading image!</p>";

if(isset($_POST['description'])) 
    $description = htmlspecialchars($_POST['description']);
else
    echo "<p>Error Loading description!</p>";
    
// Update the item in the store table 
        $editItem = $db->prepare("
        UPDATE store SET name='$name', price=$price, description='$description'
        WHERE item_id=($item_id)");
    
$editItem->execute();

header("Location: ../../pages/A-store.php");
die();	

?>

