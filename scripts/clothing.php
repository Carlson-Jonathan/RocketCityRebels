<?php 
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

while ($row = $clothingItems->fetch(PDO::FETCH_ASSOC)) {
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

	// Create qty select for small
	$qtySmall = '';
	$qtySmall .= '<select>';
	for ($i = 1; $i <= $small; $i++) {
	$qtySmall .= "<option value='" . $i . "'>" . $i . "</option>";
	}
	$qtySmall .= "</select>";

	// Create qty select for medium
	$qtyMedium = '';
	$qtyMedium .= '<select>';
	for ($i = 1; $i <= $medium; $i++) {
	$qtyMedium .= "<option value='" . $i . "'>" . $i . "</option>";
	}
	$qtyMedium .= "</select>";

	// Create qty select for large
	$qtyLarge = '';
	$qtyLarge .= '<select>';
	for ($i = 1; $i <= $large; $i++) {
	$qtyLarge .= "<option value='" . $i . "'>" . $i . "</option>";
	}
	$qtyLarge .= "</select>";

	// Create qty select for xlarge
	$qtyXLarge = '';
	$qtyXLarge .= '<select>';
	for ($i = 1; $i <= $xlarge; $i++) {
	$qtyXLarge .= "<option value='" . $i . "'>" . $i . "</option>";
	}
	$qtyXLarge .= "</select>";
    

    /**********************************************************************
    * Propogates and displays each element to the screen upon page load. On
    * clicking a specific element, this code will display a special CSS 
    * box which can be un-displayed by re-clicking anywhere on the screen.
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
                    <span class='popuptext'>Price
                    </span><br> $price</p><br>
                    <span class='popuptext'>Small</span><br>
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

        // When the user clicks anywhere, close the modal
        //clmodal" . $x . ".onclick=function() {
      //      clmodal" . $x . ".style.display = 'none';
       // }

        </script>
    ";
    $x++;
}
?>