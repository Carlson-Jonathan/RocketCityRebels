<?php
session_start();
/******************************************************************************
* File name:
*   addCart.php
* Author:
*   Kyle Kadous
* Description:   
*   Receives item information from form post submit. Stores an array into the 
*   Session items array.
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
		if (isset($_POST["AddItem"])) {
			$itemID = $_POST["itemId"];
			$exists = "false";
			$i = 0;
			$count = sizeof($_SESSION['items']);
			do
			{
				if ($_SESSION['items'][$i]['item_id'] == $itemID)
				{
					$_SESSION['items'][$i] = array (
					'item_id' => $_POST['itemId'],
					'name' => $_POST['itemName'],
					'price' => $_POST['itemPrice'],
					'qty' => $_POST["availableQty"],
					'selectQty' => $_POST['selectQty'],
					);

					$exists = "true";
				}
				$i++;
			} while ($i <= $count);

			if ($exists == "false")
			{
				$_SESSION['items'][] = array (
				'item_id' => $_POST['itemId'],
				'name' => $_POST['itemName'],
				'price' => $_POST['itemPrice'],
				'qty' => $_POST["availableQty"],
				'selectQty' => $_POST['selectQty'],
				);
			}
		}

		// For clothing items
		if (isset($_POST["AddClothing"])) {
		
		}
		
header("Location: ../pages/store.php");
?>