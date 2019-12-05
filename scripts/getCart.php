<?php 
session_start();
/******************************************************************************
* File names:
*   getCart.php
* Author:
*   Kyle Kadous
* Description:   
*   Loop through all items currently saved to the SESSION arrays and display
*   each saved item in a modal. Each line will allow you to delete the item from the
*   cart, aka SESSION, or add/subtract from the total quantity selected.
*   PayPal button is available to submit and complete the order
******************************************************************************/
// Counts for looping through both arrays in SESSION
$itemCount = 0;
$clothingCount = 0;
$totalPrice = floatval(0);

// Store forms for each array item
$itemArray = '';
$clothingArray = '';

/*********************************************************************************
* Begin looping through 'items' array, first by getting the key of the last array 
* value, then loop through the array until you hit that key.
* For each key in the array, make sure it exists and is not empty.
* Get the quantity values from array, create quantity dropdowns, and store all this
* to the 'itemArray' var to be added to the Cart Modal.
*********************************************************************************/
// Set internal pointer to array
end($_SESSION['items']);
// Get the last key in the array, because we may be removing items
$key = key($_SESSION['items']);

// Loop through array until we hit the last key. (some values may have been deleted, which is why we check)
while ($itemCount <= $key) {
	if (isset($_SESSION['items'][$itemCount]) && !empty($_SESSION['items'][$itemCount])) {
		// Using selected qty and max allowed qty, display dropdown in case user wishes to change selection
		$maxQty = $_SESSION['items'][$itemCount]['qty'];
		$qtySelected = $_SESSION['items'][$itemCount]['selectQty'];
		$qtyList = '';
		$qtyList .= '<select name="newQty">';

		for ($i = 1; $i <= $maxQty; $i++) {
		// Auto select the qty saved in the SESSION
			if ($i == $qtySelected) {
				$qtyList .= "<option value='" . $i . "' selected>" .$i . "</option>";
			}
			else {
				$qtyList .= "<option value='" . $i . "'>" . $i . "</option>";
			}
		}
		$qtyList .= "</select>";

		// Total price for row
		$itemPrice = floatval($_SESSION['items'][$itemCount]['price']) * floatval($qtySelected);

		$itemArray .= "<tr><form method='POST' action='../scripts/removeCartItem.php?itemArray_id=" . $itemCount . "'>
						<td><input type='submit' value='X'></td>
					  </form>
					  <td>" . $_SESSION['items'][$itemCount]['name'] . "</td>
					  <form action='../scripts/editCartItem.php' method='POST'>
					  <td>" . $qtyList . "</td>
					  <td>" . $itemPrice . "</td>
					  <td>
					  <input type='hidden' name='key' value='" . $itemCount . "'>
					  <input type='submit' name='EditItem' value='Save'/></td>
					  </form>
					  </tr>";

		$totalPrice = $totalPrice + floatval($itemPrice);
	}
$itemCount++;
}

/*********************************************************************************
* Begin looping through 'clothing' array, first by getting the key of the last array 
* value, then loop through the array until you hit that key.
* For each key in the array, make sure it exists and is not empty.
* Get the quantity values from array, create quantity dropdowns, and store all this
* to the 'clothingArray' var to be added to the Cart Modal.
*********************************************************************************/
// Set internal pointer to aclothing array
end($_SESSION['clothing']);
// Get the last key in the clothing array, because we may be removing clothing items
$clothingKey = key($_SESSION['clothing']);

while ($clothingCount <= $clothingKey) {
	if (isset($_SESSION['clothing'][$clothingCount]) && !empty($_SESSION['clothing'][$clothingCount])) {

		// Using selected qty's and max allowed qty's, display dropdown in case user wishes to change selection
		/***************************************************************
		* Small Selector
		****************************************************************/
		$maxSmall = $_SESSION['clothing'][$clothingCount]['availableSmall'];
		$selectedSmall = $_SESSION['clothing'][$clothingCount]['selectSmall'];
		$smallList = '';
		$smallList .= '<select name="newSmall">';

		for ($i = 0; $i <= $maxSmall; $i++) {
			// Auto select the qty saved in the SESSION
			if ($i == $selectedSmall) {
				$smallList .= "<option value='" . $i . "' selected>" .$i . "</option>";
			}
			else {
				$smallList .= "<option value='" . $i . "'>" . $i . "</option>";
			}
		}
		$smallList .= "</select>";

		/***************************************************************
		* Medium Selector
		****************************************************************/
		$maxMedium = $_SESSION['clothing'][$clothingCount]['availableMedium'];
		$selectedMedium = $_SESSION['clothing'][$clothingCount]['selectMedium'];
		$mediumList = '';
		$mediumList .= '<select name="newMedium">';

		for ($i = 0; $i <= $maxMedium; $i++) {
			// Auto select the qty saved in the SESSION
			if ($i == $selectedMedium) {
				$mediumList .= "<option value='" . $i . "' selected>" .$i . "</option>";
			}
			else {
				$mediumList .= "<option value='" . $i . "'>" . $i . "</option>";
			}
		}
		$mediumList .= "</select>";

		/****************************************************************
		* Large Selector
		*****************************************************************/
		$maxLarge = $_SESSION['clothing'][$clothingCount]['availableLarge'];
		$selectedLarge = $_SESSION['clothing'][$clothingCount]['selectLarge'];
		$largeList = '';
		$largeList .= '<select name="newLarge">';

		for ($i = 0; $i <= $maxLarge; $i++) {
			// Auto select the qty saved in the SESSION
			if ($i == $selectedLarge) {
				$largeList .= "<option value='" . $i . "' selected>" .$i . "</option>";
			}
			else {
				$largeList .= "<option value='" . $i . "'>" . $i . "</option>";
			}
		}
		$largeList .= "</select>";

		/*******************************************************************
		* XLarge Selector
		********************************************************************/
		$maxXLarge = $_SESSION['clothing'][$clothingCount]['availableXLarge'];
		$selectedXLarge = $_SESSION['clothing'][$clothingCount]['selectXLarge'];
		$xLargeList = '';
		$xLargeList .= '<select name="newXLarge">';

		for ($i = 0; $i <= $maxXLarge; $i++) {
			// Auto select the qty saved in the SESSION
			if ($i == $selectedXLarge) {
				$xLargeList .= "<option value='" . $i . "' selected>" .$i . "</option>";
			}
			else {
				$xLargeList .= "<option value='" . $i . "'>" . $i . "</option>";
			}
		}
		$xLargeList .= "</select>";

		// Total price for row, based on price and total amount of Qty
		$totalQty = floatval($selectedSmall) + floatval($selectedMedium) + floatval($selectedLarge) + floatval($selectedXLarge);
		$itemPrice = floatval($_SESSION['clothing'][$clothingCount]['price']) * floatval($totalQty);

		$clothingArray .= "<tr><form method='POST' action='../scripts/removeCartItem.php?clothingArray_id=" . $clothingCount . "'>
						<td><input type='submit' value='X'></td>
					  </form>
					  <td>" . $_SESSION['clothing'][$clothingCount]['name'] . "</td>
					  <form action='../scripts/editCartItem.php' method='POST'>
					  <td>" . $smallList . "</td>
					  <td>" . $mediumList . "</td>
					  <td>" . $largeList . "</td>
					  <td>" . $xLargeList . "</td>
					  <td>" . $itemPrice . "</td>
					  <td>
					  <input type='hidden' name='key' value='" . $clothingCount . "'>
					  <input type='submit' name='EditClothing' value='Save'/></td>
					  </form>
					  </tr>";

		$totalPrice = $totalPrice + floatval($itemPrice);
	}
$clothingCount++;
}


echo "
	<div class='modal fade' id='cart' tabindex='-1' role='dialog'>
		<div class='modal-dialog modal-lg' role='document'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button data-dismiss='modal' class='close' id='exitCartBtn'>x</button>
					<h5 class='modal-title'>Shopping Cart</h5>
				</div>
				<div class='modal-body'>
					<table class='center'>
						<tr>
							<th></th>
							<th>Item</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Change</th>
						</tr>
					$itemArray
					</table>
					<table class='center'>
						<tr>
							<th></th>
							<th>Item</th>
							<th>Small</th>
							<th>Medium</th>
							<th>Large</th>
							<th>XLarge</th>
							<th>Price</th>
							<th>Change</th>
						</tr>
					$clothingArray
					</table>
					<div>Total price: $" . $totalPrice . "<span class='total-cart'></span></div>
				</div>
				<div class='modal-footer'>
					<form method='POST' action='../scripts/orderSubmit.php'>
					<input type='hidden' name='cmd' value='_cart' />
					<input type='hidden' name='upload' value='1'>
					<input type='hidden' name='no_note' value='1' />
					<input type='hidden' name='lc' value='UK' />
					<input type='hidden' name='bn' value='PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest' />
					<input type='submit' name='OrderSubmit' class='btn btn-primary' value='Order Now' />
					</form>
				</div>
			</div>
		</div>
	</div> 

	<script>
		// When the user clicks the Cart, open the modal 
        document.getElementById('shoppingCart').onclick = function() {
          document.getElementById('cart').style.display = 'block';
        }

		// When the user clicks the exit button, close the modal 
        document.getElementById('exitCartBtn').onclick = function() {
           document.getElementById('cart').style.display = 'none';
        }
	</script>
";
?>