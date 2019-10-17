<?php 
/******************************************************************************
* File names:
*   store.php, clothing.php
* Author:
*   Jonathan Carlson, Kyle Kadous
* Description:   
*   Almost identical to the /scripts/clothing.php page, each row in the 
*   store table will be displayed on the page with a picture and name of
*   an item. A Modal will appear when an item is selected, displaying the 
*   items description, price, and a quantity selector. 
******************************************************************************/

/************************************************************************** 
* Extracts and prepares the information from the database. The php 
* concatctions allowed me to assign each item being displayed a unique
* element ID which allows specific information to be displayed when any
* individual element is clicked on. 
**************************************************************************/
$storeItems = $db->prepare("SELECT * FROM store");
$storeItems->execute();
$x = 1;

while ($row = $storeItems->fetch(PDO::FETCH_ASSOC)) {
    $item_id = $row['item_id'];
	$name = $row['name'];
    $price = $row['price'];
    $description = $row['description'];
    $quantity = $row['quantity'];
    $image = $row['image'];

    $btnID = "myBtn" . $x;
    $modelID = "myModel" . $x;

	$qtySelect = '';
	$qtySelect .= '<select name="selectQty">';
	for ($i = 1; $i <= $quantity; $i++) {
	$qtySelect .= "<option value='" . $i . "'>" . $i . "</option>";
	}
	$qtySelect .= "</select>";

		session_start();
		$itemArray = $_SESSION['test'];
    

    /**********************************************************************
    * Propogates and displays each element to the screen upon page load. On
    * clicking a specific element, this code will display a special CSS 
    * box which can be un-displayed by re-clicking anywhere on the screen.
    **********************************************************************/
    echo "
        <div class='gallery' id='$btnID'>
            <img src='../images/store/$image
            ' alt='Image file not found'>
        </div>

        <div id='$modelID' class='modal'>
            <div class='modal-content'>
			<button data-dismiss='modal' class='close' id='exitBtn" . $x . "'>x</button>
                <img src='../images/store/$image
                ' alt='Image file not found' class='innerpic'>
                <div class='textblock'>
                    <span class='popuptext'>$name
                    </span><br>
                    <span class='popuptext'>Price: 
                    </span><br> $price</p><br>
                    <span class='popuptext'>Quantity</span><br>
					<form action='' method='post'>
						<div id='quantity" . $x . "' name='quantity" . $x . "'>
							$qtySelect
						</div>
						<div class='textblock' id='addItemsDiv'>
							<input type='hidden' name='itemId' value='" . $item_id . "'>
							<input type='hidden' name='itemName' value='" . $name . "'>
							<input type='hidden' name='itemPrice' value='" . $price . "'>
							<input type='hidden' name='availableQty' value='" . $quantity . "'>
							<button type='submit' name='AddItem'>Add to cart</button>		
							<p>$itemArray</p>
						</div>
					</form>
                </div>
				
                <div class='line'></div>
                <p style='margin-top: 15px; text-align: left'>
                $description</p>
            </div>
        </div>

        <script>

        // Get the modal
        var modal" . $x . " = document.getElementById('$modelID');

        // Get the button that opens the modal
        var btn" . $x . " = document.getElementById('$btnID');

        // When the user clicks the button, open the modal 
        btn" . $x . ".onclick = function() {
          modal" . $x . ".style.display = 'block';

        }

		// When the user clicks the exit button, close the modal 
        exitBtn" . $x . ".onclick = function() {
          modal" . $x . ".style.display = 'none';

        }

        // When the user clicks anywhere, close the modal
        //modal" . $x . ".onclick=function() {
       //     modal" . $x . ".style.display = 'none';
       // }

        </script>
    ";
	// On Form Post set Session variables
	// Set all variables
	if (isset($_POST["AddItem"])) {
	$_SESSION['test'] = "hey";
		$_SESSION['item' . $x] = array (
			'item_id' => $_POST['itemID'],
			'name' => $_POST['itemName'],
			'price' => $_POST['itemPrice'],
			'qty' => $_POST["availableQty"],
			'selectQty' => $_POST['selectQty'],
		);
	} 



    $x++;
}
?>