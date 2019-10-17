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

echo '<script>window.location.href = "../../pages/A-store.php";</script>';

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

if(isset($_POST['quantity']))
    $quantity = test_input($_POST['quantity']);
else
    echo "<p>Error Loading quantity!</p>";

if(isset($_POST['small']))
    $small = test_input($_POST['small']);
else
    echo "<p>Error Loading small quantity!</p>";

if(isset($_POST['medium']))
    $medium = test_input($_POST['medium']);
else
    echo "<p>Error Loading medium quantity!</p>";

if(isset($_POST['large']))
    $large = test_input($_POST['large']);
else
    echo "<p>Error Loading large quantity!</p>";

if(isset($_POST['xlarge']))
    $xlarge = test_input($_POST['xlarge']);
else
    echo "<p>Error Loading xlarge quantity!</p>";

if(isset($_POST['image'])) 
    $image = htmlspecialchars($_POST['image']);
else
    echo "<p>Error Loading image!</p>";

if(isset($_POST['description'])) 
    $description = htmlspecialchars($_POST['description']);
else
    echo "<p>Error Loading description!</p>";

if(isset($_POST['table'])) 
    $table = htmlspecialchars($_POST['table']);
else
    echo "<p>Error Loading table!</p>";
    
// Update the item in the current table 
switch($table) {
	case 'store':
	$editItem = $db->prepare("
    UPDATE store SET name='$name', price=$price, 
	description='$description', quantity='$quantity'
    WHERE item_id=($item_id)");
	break;
	case 'clothing':
	$editItem = $db->prepare("
	UPDATE clothing SET name='$name', price=$price, 
	description='$description', small=$small, 
	medium=$medium, large=$large, xlarge=$xlarge
	WHERE item_id=($item_id)");
	break;
}
    
$editItem->execute();

header("Location: ../../pages/A-store.php");
die();	

?>

