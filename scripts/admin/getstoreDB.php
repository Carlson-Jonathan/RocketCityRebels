<?php 
/******************************************************************************
* File name:
*   getstoreDB.php
* Author:
*   Jonathan Carlson, Kyle Kadous
* Description:   
*   Pulls all items currently stored in the store database table. Admins
*   can view and update the items.
******************************************************************************/

// Prepare store table
$storeList = $db->prepare("SELECT * FROM store ORDER BY name ASC");
$storeList->execute();
$x = 1;

echo "<h3 style='text-align: center; color: darkgreen; margin-bottom: 20px' id='phonedit'>I see that you are trying to edit the database using your phone. Turn it sideways for a better view.</h3>";
// Heading for table
echo "
    <table>
        <tr>
            <th></th>
            <th>Item Name</th>
            <th style='width: 75px'>Price</th>
			<th style='width: 75px'>Quantity</th>
            <th>Image File</th>
            <th style='text-align: center'>Details</th>
        </tr>
";

// Converts the SQL date to mm/dd/yyyy format instead of yyyy/dd/mm
// This function delcaration rolls over to getrefsDB, getcoachDB and getboardDB
// function format_date($dt) {
//     $date = date_create($dt);
//     $format = date_format($date, "m/d/Y");
//     return $format;
// }

// Extract and prepare table from database
while($row = $storeList->fetch(PDO::FETCH_ASSOC)) {
    $item_id = $row['item_id'];
    $name = $row['name'];
    $price = $row['price'];
    $description = $row['description'];
	$quantity = $row['quantity'];
    $image = $row['image'];
    
    // Variables that make this page unique
    $btnID = "myBtn" . $x;
    $modelID = "myModel" . $x;
    $close = "close" . $x;

    /**************************************************************************
    * Displays store table by line with associated buttons.
    **************************************************************************/
    echo "
    
        <tr>
            <form method='POST' 
            action='../scripts/admin/removeItem.php?item_id=" . $item_id . "'>
                <td><input type='submit' class='delete' value='X'></td>
                <input type='hidden' name='table' value='store'>
            </form>
            
            <td><p class='darktext'>$name</p></td>
            <td><p class='darktext'>$price</p></td>
			<td><p class='darktext'>$quantity</p></td>
            <td><p class='darktext'>$image</p></td>
            <td style='text-align: center'>
            <button type='text' class='edit' id='$btnID'>Edit</button></td>
            
            <!-----------------------------------------------------------------
            - The pop-up that appears when the 'edit' button is clicked.
            ------------------------------------------------------------------>
            <div id='$modelID' class='modal'>
                <div class='modal-content'>
                    <span class='close' id='$close'>&times;</span>
                    
                    <form method='POST' action='../scripts/admin/editItem.php'>
                        
                        <img src='../images/store/$image' alt='Image file not found' class='innerpic'>
                        
                        <div class='textblock'>
                            <span class='popuptext'>Item name:</span><br>
                                <input name='name' type='text' value='$name' maxlength='49' required><br><br>
                            
                            <span class='popuptext'>Item Price</span><br> 
                                <input name='price' type='number' value='$price' step='0.01' required><br><br>

							<span class='popuptext'>Item Quantity</span><br> 
                                <input name='quantity' type='number' value='$quantity' required><br><br>
                        </div>
                        
                        <div class='line'></div>
                        
                        <textarea rows='8' cols='50' name='description' placeholder='Enter descriptive text here.'>$description</textarea>
                        
                        <input type='hidden' value='store' name='table'>
                        <input type='hidden' value='$item_id' name='item_id'>
                        
                        <input type='submit' value='Save' class='save'>
                        
                    </form>
                    
                </div>
            </div>

            <script>
            // Get the modal
            var modal" . $x . " = document.getElementById('$modelID');

            // Get the button that opens the modal
            var btn" . $x . " = document.getElementById('$btnID');

            var exit" . $x . " = document.getElementById('$close');
            
            // When the user clicks the button, open the modal 
            btn" . $x . ".onclick = function() {
              modal" . $x . ".style.display = 'block';
            }

            // When the user clicks 'X', close the modal
            exit" . $x . ".onclick=function() {
                modal" . $x . ".style.display = 'none';
            }

            </script>
        </tr>
    ";
    $x++;
}

/******************************************************************************
* The line that allows the user to add an item to the store database.
******************************************************************************/
echo "
        <tr>
            <form method='POST' action='../scripts/admin/addItem.php'>
                
                <td><input type='submit' class='delete' value='+' 
                    style='background-color: #aad400'></td>
                <td><input class='darktext' type='text' maxlength='49' 
                    name='name' required></td>
                <td><input class='darktext' type='number' name='price' step='0.01' required></td>
				<td><input class='darktext' type='number' name='quantity' required></td>
                <td><input class='darktext' type='text' name='image' 
                    maxlength='19' required></td>
                <input type='hidden' name='table' value='store'>
            </form>            
        </tr>
    </table>
";
    
?>