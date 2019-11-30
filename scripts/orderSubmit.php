<?php
session_start();
/******************************************************************
* File name:
*   orderSubmit.php
* Author:
*   Kyle Kadous
* Description:   
*   Retrieve each item stored in the SESSION and validate prices and 
*   quantities with those saved in the DataBase. This is to prevent
*   manipulation of quantities and prices on the user's end. After,
*   submit a PayPal form with Total Price and invoice of items.
*******************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

echo '<script>window.location.href = "../pages/store.php";</script>';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// PayPal Configuration settings
$paypalConfig = [
    'email' => 'sb-i6faj504453@business.example.com',
    'return_url' => 'https://hidden-ridge-45617.herokuapp.com/pages/store.php',
    'cancel_url' => 'http://example.com/payment-cancelled.html',
    'notify_url' => 'http://hidden-ridge-45617.herokuapp.com/scripts/orderSubmit.php'
];


// If Sandbox is enabled use it, otherwise compete real order transaction
$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {
	// Create data array and begin setting each item data in it, as well as paypal parameters
		 $data = [];
	// Counts for looping through both arrays in SESSION
	$itemCount = 0;
	$clothingCount = 0; 
	$x = 1;

	// Object for storing new qty's for post back
	$updateObj = new stdClass();
	// First we need to test data from Sessions and verify quantities and prices with
	// the database

	// Set internal pointer to array
	end($_SESSION['items']);
	// Get the last key in the array, because we may be removing items
	$itemKey = key($_SESSION['items']);

	while ($itemCount <= $itemKey) {
		if (isset($_SESSION['items'][$itemCount]) && !empty($_SESSION['items'][$itemCount])) {
			// Get row by id
			$itemId = test_input($_SESSION['items'][$itemCount]['item_id']);
			$storeList = $db->prepare("SELECT * FROM store WHERE item_id = " . $itemId . "");
			$storeList->execute();

			while ($row = $storeList->fetch(PDO::FETCH_ASSOC)) {
				if ($row['quantity'] >= test_input($_SESSION['items'][$itemCount]['selectQty'])) {				
					$item_name = 'item_name_' . $x;
					$item_amount = 'amount_' . $x;
					$item_Qty = 'quantity_' . $x;
					$item_NewQty = 'Q' . $x;
					$item_id = 'item_number_' . $x;
					$data[$item_name] = $row['name'];
					$data[$item_amount] = $row['price'];
					$data[$item_Qty] = test_input($_SESSION['items'][$itemCount]['selectQty']);
					$data[$item_id] = $itemId;

					// Add newQty to Object
					$updateObj->$item_NewQty = $row['quantity'] - floatval(test_input($_SESSION['items'][$itemCount]['selectQty']));
					$x++;
				}
			}
		}
		$itemCount++;
	}

	// Now do the same for Clothing items
	// Set internal pointer to array
	end($_SESSION['clothing']);
	// Get the last key in the array
	$clothingKey = key($_SESSION['clothing']);

	while ($clothingCount <= $clothingKey) {
		if (isset($_SESSION['clothing'][$clothingCount]) && !empty($_SESSION['clothing'][$clothingCount])) {
			// Get row by id
			$clothingId = test_input($_SESSION['clothing'][$clothingCount]['item_id']);
			$clothingList = $db->prepare("SELECT * FROM clothing WHERE item_id = " . $clothingId . "");
			$clothingList->execute();

			while ($row = $clothingList->fetch(PDO::FETCH_ASSOC)) {
				if ($row['small'] >= test_input($_SESSION['clothing'][$clothingCount]['selectSmall']) && 
					$row['medium'] >= test_input($_SESSION['clothing'][$clothingCount]['selectMedium']) &&
					$row['large'] >= test_input($_SESSION['clothing'][$clothingCount]['selectLarge']) &&
					$row['xlarge'] >= test_input($_SESSION['clothing'][$clothingCount]['selectXLarge'])) {	
					// Set Data Parameters
					$item_name = 'item_name_' . $x;
					$item_amount = 'amount_' . $x;
					$item_Qty = 'quantity_' . $x;
					$item_id = 'item_number_' . $x;

					// New Qty's for obj storage'
					$item_small = 'S' . $x;
					$item_medium = 'M' . $x;
					$item_large = 'L' . $x;
					$item_xLarge = 'X' . $x;

					// Set each qty Value
					$small = test_input($_SESSION['clothing'][$clothingCount]['selectSmall']);
					$medium = test_input($_SESSION['clothing'][$clothingCount]['selectMedium']);
					$large = test_input($_SESSION['clothing'][$clothingCount]['selectLarge']);
					$xLarge = test_input($_SESSION['clothing'][$clothingCount]['selectXLarge']);
					// Save to Data
					$data[$item_name] = $row['name'];
					$data[$item_amount] = $row['price'];
					$data[$item_Qty] = floatval($small) + floatval($medium) + floatval($large) + floatval($xLarge);
					$data[$item_id] = $clothingId;

					$updateObj->$item_small = floatval($row['small']) - floatval($small);
					$updateObj->$item_medium = floatval($row['medium']) - floatval($medium);
					$updateObj->$item_large = floatval($row['large']) - floatval($large);
					$updateObj->$item_xLarge = floatval($row['xlarge']) - floatval($xLarge);


					$x++;
				}
			}
		}
		$clothingCount++;
	}

	// Loop through all purchased items and set them
    foreach ($_POST as $key => $value) {
        $data[$key] = stripslashes($value);
    }

	// Set parameters
	// Set the PayPal account.
    $data['business'] = $paypalConfig['email'];

	// Also add both counts to Data
	$data['num_cart_items'] = floatval($itemCount) + floatval(clothingCount);

	// Testing Memo variable

    // Set the PayPal return addresses.
    $data['return'] = stripslashes($paypalConfig['return_url']);
    $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
    $data['notify_url'] = stripslashes($paypalConfig['notify_url']);

	 // and currency so that these aren't overridden by the form data.
    $data['currency_code'] = 'USD';

	// Set custom variable, which stores JSON of all qty values for updating Quantities in DB
	$updateJSON = json_encode($updateObj);
	$data['custom'] = $updateJSON;


	 $queryString = http_build_query($data);

	 // Redirect to paypal IPN
    header('location:' . $paypalUrl . '?' . $queryString);
    exit();
}
else {
	// Handle Response from PayPal IPN

	// Set a count variable to help us loop through all items and then all clothingItems
	$responseCount = 1;

	$totalItems = $_POST['num_cart_items'];
	$jsonObject = json_decode($_POST['custom']);



	// Loop through each Posted item and edit DataBase.
	while ($responseCount <= $totalItems) {
		// Get Item number
		$itemID = 'item_number' . $responseCount;

		// Set Post search parameters
		$Qty = 'Q' . $responseCount;
		$S = 'S' . $responseCount;
		$M = 'M' . $responseCount;
		$L = 'L' . $responseCount;
		$XL = 'X' . $responseCount;

		$id = test_input($_POST[$itemID]);
		// Check if $Qty exists, else do Update to Store
		if (isset($jsonObject->$qty)) {
			$newQty = $jsonObject->$Qty;

			// Edit row in database
			$editItem = $db->prepare("
			UPDATE store SET quantity='$newQty'
			WHERE item_id=($id)");
		}
		else {
			$newSmall = $jsonObject->$S;
			$newMedium = $jsonObject->$M;
			$newLarge = $jsonObject->$L;
			$newXLarge = $jsonObject->$XL;

			$editItem = $db->prepare("
			UPDATE clothing SET small=$newSmall, 
			medium=$newMedium, large=$newLarge, xlarge=$newXLarge
			WHERE item_id=($id)");
		}

		$editItem->execute();	

		$responseCount++;
	}

}

header("Location: ../pages/store.php");
?>