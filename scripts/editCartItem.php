<?php
session_start();
/******************************************************************************
* File name:
*   editCart.php
* Author:
*   Kyle Kadous
* Description:   
*   Edit a cart item in the session array based on new qtyselected and array key
*   Both types of items can be changed here.
******************************************************************************/

echo '<script>window.location.href = "../pages/store.php";</script>';

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Set all variables
if (isset($_POST["EditItem"])) {
	$key = test_input($_POST["key"]);

	// Make sure new quantity is not Zero
	if (test_input($_POST['newQty']) == 0) {
		unset($_SESSION['items'][$key]);
	}
	else {
		// Changed Selected Quantity
		$_SESSION['items'][$key]['selectQty'] = test_input($_POST['newQty']);
	}
}
else {
	echo "Unable to change Quantity";
}

if (isset($_POST["EditClothing"])) {
	$key = test_input($_POST["key"]);

	// Make sure all new values are Not all Zero
	if (test_input($_POST['newSmall']) == 0 && test_input($_POST['newMedium']) == 0 && test_input($_POST['newLarge']) == 0 && test_input($_POST['newXLarge']) == 0) {
		unset($_SESSION['clothing'][$key]);
	}
	else {
		// Change quantities
		$_SESSION['clothing'][$key]['selectSmall'] = test_input($_POST['newSmall']);
		$_SESSION['clothing'][$key]['selectMedium'] = test_input($_POST['newMedium']);
		$_SESSION['clothing'][$key]['selectLarge'] = test_input($_POST['newLarge']);
		$_SESSION['clothing'][$key]['selectXLarge'] = test_input($_POST['newXLarge']);
	}
}
else {
	echo "Unable to change Quantities";
}
		
header("Location: ../pages/store.php");
?>