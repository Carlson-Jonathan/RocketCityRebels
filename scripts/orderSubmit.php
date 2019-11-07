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
    'return_url' => 'http://example.com/payment-successful.html',
    'cancel_url' => 'http://example.com/payment-cancelled.html',
    'notify_url' => 'https://hidden-ridge-45617.herokuapp.com//scripts/orderSubmit.php'
];

// If Sandbox is enabled use it, otherwise compete real order transaction
$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {
// Counts for looping through both arrays in SESSION
$itemCount = 0;
$clothingCount = 0;

	// Count for each item added to data array 
	$x = 1;
	// First we need to test data from Sessions and verify quantities and prices with
	// the database

	// Set internal pointer to array
	end($_SESSION['items']);
	// Get the last key in the array, because we may be removing items
	$key = key($_SESSION['items']);

	while ($itemCount <= $key) {
		// Get row by id
		$itemId = test_input($_SESSION['items'][$itemCount]['item_id']);
		$storeList = $db->prepare("SELECT * FROM store WHERE item_id=1");
		$storeList->execute();

		while ($row = $storeList->fetch(PDO::FETCH_ASSOC)) {
			if ($row['quantity'] >= test_input($_SESSION['items'][$itemCount]['selectQty']) && $row['price'] == test_input($_SESSION['items'][$itemCount]['price'])) {
				$item_name = 'item_name_' + $x;
				$item_amount = 'amount_' + $x;
				$item_Qty = 'quantity_' + $x;
				$item_id = 'item_id_' + $x;
				$data[$item_name] = $item['name'];
				$data[$item_amount] = $item['price'];
				$data[$item_Qty] = $item['selectQty'];
				$data[$item_id] = $itemId;
			}
		}
		$itemCount++;
	}



	// Create data array and begin setting each item data in it, as well as paypal parameters
	// Loop through all purchased items and set them
	 $data = [];
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