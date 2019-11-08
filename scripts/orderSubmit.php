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
					$item_id = 'item_id_' . $x;
					$data[$item_name] = $row['name'];
					$data[$item_amount] = $row['price'];
					$data[$item_Qty] = test_input($_SESSION['items'][$itemCount]['selectQty']);
					$data[$item_id] = $itemId;
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
					$item_id = 'item_id_' . $x;
					$item_small = 'item_small' . $x;
					$item_medium = 'item_medium' . $x;
					$item_large = 'item_large' . $x;
					$item_xLarge = 'item_xLarge' . $x;

					// Set each qty Value
					$small = test_input($_SESSION['clothing'][$clothingCount]['selectSmall']);
					$medium = test_input($_SESSION['clothing'][$clothingCount]['selectMedium']);
					$large = test_input($_SESSION['clothing'][$clothingCount]['selectLarge']);
					$xLarge = test_input($_SESSION['clothing'][$clothingCount]['selectXLarge']);
					// Save to Data
					$data[$item_name] = $row['name'];
					$data[$item_amount] = $row['price'];
					$data[$item_Qty] = floatval($small) + floatval($medium) + floatval($large) + floatval($xLarge);
					$data[$item_small] = $small;
					$data[$item_medium] = $medium;
					$data[$item_large] = $large;
					$data[$item_xLarge] = $xLarge;
					$data[$item_id] = $itemId;
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

    // Set the PayPal return addresses.
    $data['return'] = stripslashes($paypalConfig['return_url']);
    $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
    $data['notify_url'] = stripslashes($paypalConfig['notify_url']);

	 // and currency so that these aren't overridden by the form data.
    $data['currency_code'] = 'USD';

	 $queryString = http_build_query($data);

	 // Redirect to paypal IPN
    header('location:' . $paypalUrl . '?' . $queryString);
    exit();

}
else {
}

header("Location: ../pages/store.php");
?>