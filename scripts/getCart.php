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