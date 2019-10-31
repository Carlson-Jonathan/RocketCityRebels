<?php 
session_start();
/******************************************************************************
* File names:
*   getCart.php
* Author:
*   Kyle Kadous
* Description:   
*   Loop through all items currently saved to the SESSION arrays and display
*   each saved item in a modal. Each line will allow you delete the item from the
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

// Set internal pointer to array
end($_SESSION['items']);
// Get the last key in the array, because we may be removing items
$key = key($_SESSION['items']);

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
		$qtyList .= "<option value='" . $i . "'>" . $i . "</option>";
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
					  <input type='submit' name='EditItem' value='Save Change'/></td>
					  </form>
					  </tr>";

		$totalPrice = $totalPrice + floatval($itemPrice);
	}
$itemCount++;
}


echo "
	<div class='modal fade' id='cart' tabindex='-1' role='dialog'>
		<div class='modal-dialog modal-lg' role='document'>
			<div class='modal-content'>
				<div class='modal-header'>
					<h5 class='modal-title'>Shopping Cart</h5>
					<button data-dismiss='modal' class='close' id='exitCartBtn'>x</button>
				</div>
				<div class='modal-body'>
					<table class='show-cart table'>
						<tr>
							<th></th>
							<th>Item</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Change</th>
						</tr>
					$itemArray
					</table>
					<table class='show-cart table'>
					$clothingArray
					</table>
					<div>Total price: $" . $totalPrice . "<span class='total-cart'></span></div>
				</div>
				<div class='modal-footer'>
					<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
					<button type='button' class='btn btn-primary'>Order now</button>
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