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
	$key = $_POST["key"];

	// Make sure new quantity is not Zero
	if ($_POST['newQty'] == 0) {
		unset($_SESSION['items'][$key]);
	}
	else {
		// Changed Selected Quantity
		$_SESSION['items'][$key]['selectQty'] = $_POST['newQty'];
	}
}
else {
	echo "Unable to change Quantity";
}

if (isset($_POST["EditClothing"])) {
	$key = $_POST["key"];

	// Make sure all new values are Not all Zero
	if ($_POST['newSmall'] == 0 && $_POST['newMedium'] == 0 && $_POST['newLarge'] == 0 && $_POST['newXLarge'] == 0) {
		unset($_SESSION['clothing'][$key]);
	}
	else {
		// Change quantities
		$_SESSION['clothing'][$key]['selectSmall'] = $_POST['newSmall'];
		$_SESSION['clothing'][$key]['selectMedium'] = $_POST['newMedium'];
		$_SESSION['clothing'][$key]['selectLarge'] = $_POST['newLarge'];
		$_SESSION['clothing'][$key]['selectXLarge'] = $_POST['newXLarge'];
	}
}
else {
	echo "Unable to change Quantities";
}
		
header("Location: ../pages/store.php");
?>