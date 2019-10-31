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

// Store forms for each array item
$itemArray = '';
$clothingArray = '';

while ($itemCount < sizeof($_SESSION['items'])) {
	
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
					$itemArray
					</table>
					<table class='show-cart table'>
					$clothingArray
					</table>
					<div>Total price: $<span class='total-cart'></span></div>
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