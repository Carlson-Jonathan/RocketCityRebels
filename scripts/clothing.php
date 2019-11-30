<?php 
session_start();
/******************************************************************************
* File names:
*   store.php, clothing.php
* Author:
*   Jonathan Carlson, Kyle Kadous
* Description:   
*   Almost identical to the /scripts/store.php page, each row in the 
*   clothing table will be displayed on the page with a picture and name of
*   an item. A Modal will appear when an item is selected, displaying the 
*   items description, price, and a quantity selector for each size.
******************************************************************************/

/************************************************************************** 
* Extracts and prepares the information from the database. The php 
* concatctions allowed me to assign each item being displayed a unique
* element ID which allows specific information to be displayed when any
* individual element is clicked on. 
**************************************************************************/
$clothingItems = $db->prepare("SELECT * FROM clothing");
$clothingItems->execute();
$x = 1;

//Check if clothing array already exists. If it does not, then instantiate it
if (!isset($_SESSION['clothing'])) {
	$_SESSION['clothing'] = array();
}

while ($row = $clothingItems->fetch(PDO::FETCH_ASSOC)) {
    $item_id = $row['item_id'];
	$name = $row['name'];
    $price = $row['price'];
    $description = $row['description'];
    $small = $row['small'];
    $medium = $row['medium'];
    $large = $row['large'];
    $xlarge = $row['xlarge'];
    $image = $row['image'];

    $clbtnID = "clBtn" . $x;
    $clmodelID = "clModel" . $x;

	/*********************************************************************
	* Create variables to hold Quantity selectors for the current clothing
	* item, making sure that the available quantity shown matches the 
	* DB values
	**********************************************************************/
	// Create qty select for small
	$qtySmall = '';
	$qtySmall .= '<select name="selectSmall">';
	for ($i = 0; $i <= $small; $i++) {
	$qtySmall .= "<option value='" . $i . "'>" . $i . "</option>";
	}
	$qtySmall .= "</select>";

	// Create qty select for medium
	$qtyMedium = '';
	$qtyMedium .= '<select name="selectMedium">';
	for ($i = 0; $i <= $medium; $i++) {
	$qtyMedium .= "<option value='" . $i . "'>" . $i . "</option>";
	}
	$qtyMedium .= "</select>";

	// Create qty select for large
	$qtyLarge = '';
	$qtyLarge .= '<select name="selectLarge">';
	for ($i = 0; $i <= $large; $i++) {
	$qtyLarge .= "<option value='" . $i . "'>" . $i . "</option>";
	}
	$qtyLarge .= "</select>";

	// Create qty select for xlarge
	$qtyXLarge = '';
	$qtyXLarge .= '<select name="selectXLarge">';
	for ($i = 0; $i <= $xlarge; $i++) {
	$qtyXLarge .= "<option value='" . $i . "'>" . $i . "</option>";
	}
	$qtyXLarge .= "</select>";

    /**********************************************************************
    * Propogates and displays each element to the screen upon page load. On
    * clicking a specific element, this code will display a special CSS 
    * box which can be un-displayed by re-clicking anywhere on the screen.
	*
	* The form submit button will send selected values to Scripts/addCart.php
	* and add the clothing item to the cart via the Session 'clothing' array.
    **********************************************************************/
    echo "
        <div class='gallery' id='$clbtnID'>
            <img src='../images/store/$image
            ' alt='Image file not found'>
        </div>

        <div id='$clmodelID' class='modal'>
            <div class='modal-content'>
			<button data-dismiss='modal' class='close' id='exitClBtn" . $x . "'>x</button>
                <img src='../images/store/$image
                ' alt='Image file not found' class='innerpic'>
                <div class='textblock'>
                    <span class='popuptext'>$name</span><br>
                    <span class='popuptext'>Price: 
                    </span><br> $price</p><br>
                    <span class='popuptext'>Small</span><br>
					<form action='../scripts/addCart.php' method='POST'>
						<div id='smallQty" . $x . "'>
						$qtySmall
						</div>
						<span class='popuptext'>Medium</span><br> 
						<div id='mediumQty" . $x . "'>
						$qtyMedium
						</div>
						<span class='popuptext'>Large</span><br> 
						<div id='largeQty" . $x . "'>
						$qtyLarge
						</div>
						<span class='popuptext'>XLarge</span><br>  
						<div id='xlargeQty" . $x . "'>
						$qtyXLarge
						</div>
						<div class='textblock' id='addClothingDiv'>
							<input type='hidden' name='itemNum' value='" . $x . "'>
							<input type='hidden' name='itemId' value='" . $item_id . "'>
							<input type='hidden' name='itemName' value='" . $name . "'>
							<input type='hidden' name='itemPrice' value='" . $price . "'>
							<input type='hidden' name='availableSmall' value='" . $small . "'>
							<input type='hidden' name='availableMedium' value='" . $medium . "'>
							<input type='hidden' name='availableLarge' value='" . $large . "'>
							<input type='hidden' name='availableXLarge' value='" . $xlarge . "'>
							<input type='submit' name='AddClothing'>Add to cart</button>		
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
        var clmodal" . $x . " = document.getElementById('$clmodelID');

        // Get the button that opens the modal
        var clbtn" . $x . " = document.getElementById('$clbtnID');

        // When the user clicks the button, open the modal 
        clbtn" . $x . ".onclick = function() {
          clmodal" . $x . ".style.display = 'block';
        }

		// When the user clicks the exit button, close the modal 
        exitClBtn" . $x . ".onclick = function() {
          clmodal" . $x . ".style.display = 'none';

        }

        </script>
    ";
    $x++;
}
?>