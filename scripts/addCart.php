<?php
session_start();
/******************************************************************************
* File name:
*   addCart.php
* Author:
*   Kyle Kadous
* Description:   
*   Receives item information from form post submit. Stores an array into the 
*   Session 'items' or 'clothing' array.
******************************************************************************/

echo '<script>window.location.href = "../pages/store.php";</script>';

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*******************************************************************************
* Check if the "AddItem" Submit button was clicked.
* Then, check to make sure that the posted 'itemId' does not already exist in the 
* 'items' Session array. If it does, then change the quantity value of the existing
* item. Otherwise, add it to the array.
*******************************************************************************/
if (isset($_POST["AddItem"])) {
	$itemID = test_input($_POST["itemId"]);
	$exists = "false";
	$i = 0;
	$count = sizeof($_SESSION['items']);
	do
	{
		if ($_SESSION['items'][$i]['item_id'] == $itemID)
		{
			// If submitted Quantity equals Zero, delete row from array
			if ($_POST['selectQty'] == 0) {
				unset($_SESSION['items'][$i]);
			}
			else {
				$_SESSION['items'][$i] = array (
					'item_id' => test_input($_POST['itemId']),
					'name' => test_input($_POST['itemName']),
					'price' => test_input($_POST['itemPrice']),
					'qty' => test_input($_POST["availableQty"]),
					'selectQty' => test_input($_POST['selectQty']),
				);
			}				
			$exists = "true";
		}
		$i++;
	} while ($i <= $count);

	// If does not exists and the submitted Quantity does not equal 0
	if ($exists == "false" && $_POST['selectQty'] != 0)
	{
		$_SESSION['items'][] = array (
		'item_id' => test_input($_POST['itemId']),
		'name' => test_input($_POST['itemName']),
		'price' => test_input($_POST['itemPrice']),
		'qty' => test_input($_POST["availableQty"]),
		'selectQty' => test_input($_POST['selectQty']),
		);
	}
}

/*******************************************************************************
* Check if the "AddClothing" Submit button was clicked.
* Then, check to make sure that the posted 'itemId' does not already exist in the 
* 'clothing' Session array. If it does, then change the quantity values of the existing
* clothing item. Otherwise, add it to the array.
*******************************************************************************/
if (isset($_POST["AddClothing"])) {
	$itemID = test_input($_POST["itemId"]);
	$exists = "false";
	$i = 0;
	$count = sizeof($_SESSION['clothing']);
	do
	{
		if ($_SESSION['clothing'][$i]['item_id'] == $itemID)
		{
			// Verify that not all quantity values are zero
			if (test_input($_POST['selectSmall']) == 0 && test_input($_POST['selectMedium']) == 0 && test_input($_POST['selectLarge']) == 0 && test_input($_POST['selectXLarge']) == 0) {
			unset($_SESSION['clothing'][$i]);
			}
			else {
				$_SESSION['clothing'][$i] = array (
					'item_id' => test_input($_POST['itemId']),
					'name' => test_input($_POST['itemName']),
					'price' => test_input($_POST['itemPrice']),
					'availableSmall' => test_input($_POST["availableSmall"]),
					'availableMedium' => test_input($_POST["availableMedium"]),
					'availableLarge' => test_input($_POST["availableLarge"]),
					'availableXLarge' => test_input($_POST["availableXLarge"]),
					'selectSmall' => test_input($_POST['selectSmall']),
					'selectMedium' => test_input($_POST['selectMedium']),
					'selectLarge' => test_input($_POST['selectLarge']),
					'selectXLarge' => test_input($_POST['selectXLarge']),
				);
			}
			$exists = "true";
		}
		$i++;
	} while ($i <= $count);

	// If does not exists and not all quantities equal zero
	if ($exists == "false" && test_input($_POST['selectSmall']) != 0 || test_input($_POST['selectMedium']) != 0 || test_input($_POST['selectLarge']) != 0 || test_input($_POST['selectXLarge']) != 0)
	{
		$_SESSION['clothing'][] = array (
			'item_id' => test_input($_POST['itemId']),
			'name' => test_input($_POST['itemName']),
			'price' => test_input($_POST['itemPrice']),
			'availableSmall' => test_input($_POST["availableSmall"]),
			'availableMedium' => test_input($_POST["availableMedium"]),
			'availableLarge' => test_input($_POST["availableLarge"]),
			'availableXLarge' => test_input($_POST["availableXLarge"]),
			'selectSmall' => test_input($_POST['selectSmall']),
			'selectMedium' => test_input($_POST['selectMedium']),
			'selectLarge' => test_input($_POST['selectLarge']),
			'selectXLarge' => test_input($_POST['selectXLarge']),
		);
	}
}
		
header("Location: ../pages/store.php");
?>