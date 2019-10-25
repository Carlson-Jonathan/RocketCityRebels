<?php
/******************************************************************************
* File name:
*   addCart.php
* Author:
*   Kyle Kadous
* Description:   
*   Receives item information from form post submit. Stores an array into the 
*   Session items array.
******************************************************************************/

echo '<script>window.location.href = "/store.php";</script>';

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Set all variables
	if (isset($_POST["AddItem"])) {
	// PHP variable must have daat received from SESSION or POSt to be accepted as Parameters, dumb right?!
	    $itemNum = $_POST["itemNum"];
		$newArray = array (
			'item_id' => $_POST['itemID'],
			'name' => $_POST['itemName'],
			'price' => $_POST['itemPrice'],
			'qty' => $_POST["availableQty"],
			'selectQty' => $_POST['selectQty'],
		);
		array_push($_SESSION['items'], $newArray);
	} 
header("Location: /store.php.php");
?>