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
    $name = $row['name'];
    $price = $row['price'];
    $description = $row['description'];
    $quantity = $row['quantity'];
    $image = $row['image'];

    $btnID = "myBtn" . $x;
    $modelID = "myModel" . $x;

	// Add the quantity select to each item onload
		  $qtySelect = '<select>';
		  $i = 0;
		  for ($i; $i < $quantity; $i++) {
		  	  $qtySelect += '<option value=' . $quantity . '>' . $quantity . '</option>';
		  }
		  $qtySelect += '</select>';
    

    /**********************************************************************
    * Propogates and displays each element to the screen upon page load. On
    * clicking a specific element, this code will display a special CSS 
    * box which can be un-displayed by re-clicking anywhere on the screen.
    **********************************************************************/
    echo "
        <div class='gallery' id='$btnID'>
            <img src='../images/portraits/$image
            ' alt='Image file not found'>
        </div>

        <div id='$modelID' class='modal'>
            <div class='modal-content'>
                <img src='../images/store/$image
                ' alt='Image file not found' class='innerpic'>
                <div class='textblock'>
                    <span class='popuptext'>$name
                    </span><br>
                    <span class='popuptext'>Price:
                    </span><br> $price</p><br>
                    <span class='popuptext'>Select Quantity</span><br>
					<div id='quantity" . $x . "'>
					$qtySelect
					</div>
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
		  loadQuantity();

        }

        // When the user clicks anywhere, close the modal
        modal" . $x . ".onclick=function() {
            modal" . $x . ".style.display = 'none';
        }

        </script>
    ";
    $x++;
}
?>