<?php
/*****************************************************************************
* This script adds an item to the store or clothing table in the database.
***************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

echo '<script>window.location.href = "../../pages/store.php";</script>';
session_start();

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Set variables and run through security function
	if(isset($_GET['itemNum']))
		$itemNum = htmlspecialchars($_GET['itemNum']);
	else
		echo "<p>Error Loading item_id!</p>";

	if(isset($_POST['itemID']))
        $item_id = test_input($_POST['itemID']);
    else
        echo "<p>Error Loading id!</p>";

    if(isset($_POST['itemName']))
        $name = test_input($_POST['itemName']);
    else
        echo "<p>Error Loading name!</p>";

    if(isset($_POST['itemPrice']))
        $price = test_input($_POST['itemPrice']);
    else
        echo "<p>Error Loading number!</p>";

	if(isset($_POST['availableQty']))
        $quantity = test_input($_POST['availableQty']);
    else
        echo "<p>Error Loading quantity!</p>";

	if(isset($_POST['selectQty']))
        $selectQty = test_input($_POST['selectQty']);
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

	if(isset($_POST['table'])) 
        $table = htmlspecialchars($_POST['table']);
    else
        echo "<p>Error Loading table!</p>";


		// Add new array item to items array in Session.
		$_SESSION['items']['2'] = array (
			'item_id' => $itemID,
			'name' => $name,
			'price' => $price,
			'qty' => $quantity,
			'selectQty' => $selectQty,
		);


header("Location: ../../pages/store.php");
die();	

?>