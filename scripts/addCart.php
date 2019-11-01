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
			$itemID = $_POST["itemId"];
			$exists = "false";
			$i = 0;
			$count = sizeof($_SESSION['clothing']);
			do
			{
				if ($_SESSION['clothing'][$i]['item_id'] == $itemID)
				{
					$_SESSION['clothing'][$i] = array (
					'item_id' => $_POST['itemId'],
					'name' => $_POST['itemName'],
					'price' => $_POST['itemPrice'],
					'availableSmall' => $_POST["availableSmall"],
					'availableMedium' => $_POST["availableMedium"],
					'availableLarge' => $_POST["availableLarge"],
					'availableXLarge' => $_POST["availableXLarge"],
					'selectSmall' => $_POST['selectSmall'],
					'selectMedium' => $_POST['selectMedium'],
					'selectLarge' => $_POST['selectLarge'],
					'selectXLarge' => $_POST['selectXLarge'],
					);

					$exists = "true";
				}
				$i++;
			} while ($i <= $count)

			if ($exists == "false")
			{
				$_SESSION['clothing'][] = array (
					'item_id' => $_POST['itemId'],
					'name' => $_POST['itemName'],
					'price' => $_POST['itemPrice'],
					'availableSmall' => $_POST["availableSmall"],
					'availableMedium' => $_POST["availableMedium"],
					'availableLarge' => $_POST["availableLarge"],
					'availableXLarge' => $_POST["availableXLarge"],
					'selectSmall' => $_POST['selectSmall'],
					'selectMedium' => $_POST['selectMedium'],
					'selectLarge' => $_POST['selectLarge'],
					'selectXLarge' => $_POST['selectXLarge'],
					);
			}
		}
		
header("Location: ../pages/store.php");
?>