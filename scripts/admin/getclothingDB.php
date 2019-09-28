<?php 
/******************************************************************************
* File name:
*   getclothingDB.php
* Author:
*   Jonathan Carlson, Kyle Kadous
* Description:   
*   Pulls all items currently stored in the clothing database table. Admins
*   can view and update the items.
******************************************************************************/

// Prepare store table
$clothingList = $db->prepare("SELECT * FROM clothing ORDER BY name ASC");
$clothingList->execute();
$x = 1;

echo "<h3 style='text-align: center; color: darkgreen; margin-bottom: 20px' id='phonedit'>I see that you are trying to edit the database using your phone. Turn it sideways for a better view.</h3>";
// Heading for table
echo "
    <table>
        <tr>
            <th></th>
            <th>Item Name</th>
            <th style='width: 75px'>Price</th>
			<th style='width: 75px'>Small</th>
			<th style='width: 75px'>Medium</th>
			<th style='width: 75px'>Large</th>
			<th style='width: 75px'>XLarge</th>
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
while($row = $clothingList->fetch(PDO::FETCH_ASSOC)) {
    $item_id = $row['item_id'];
    $name = $row['name'];
    $price = $row['price'];
    $description = $row['description'];
	$small = $row['small'];
	$medium = $row['medium'];
	$large = $row['large'];
	$xlarge = $row['xlarge'];
    $image = $row['image'];
    
    // Variables that make this page unique
    $btnID = "myBtn" . $x;
    $clmodelID = "clModel" . $x;
    $close = "close" . $x;

    /**************************************************************************
    * Displays clothing table by line with associated buttons.
    **************************************************************************/
    echo "
    
        <tr>
            <form method='POST' 
            action='../scripts/admin/removeItem.php?item_id=" . $item_id . "'>
                <td><input type='submit' class='delete' value='X'></td>
                <input type='hidden' name='table' value='clothing'>
            </form>
            
            <td><p class='darktext'>$name</p></td>
            <td><p class='darktext'>$price</p></td>
			<td><p class='darktext'>$small</p></td>
			<td><p class='darktext'>$medium</p></td>
			<td><p class='darktext'>$large</p></td>
			<td><p class='darktext'>$xlarge</p></td>
            <td><p class='darktext'>$image</p></td>
            <td style='text-align: center'>
            <button type='text' class='edit' id='$btnID'>Edit</button></td>
            
            <!-----------------------------------------------------------------
            - The pop-up that appears when the 'edit' button is clicked.
            ------------------------------------------------------------------>
            <div id='$clmodelID' class='modal'>
                <div class='modal-content'>
                    <span class='close' id='$close'>&times;</span>
                    
                    <form method='POST' action='../scripts/admin/editItem.php'>
                        
                        <img src='../images/store/$image' alt='Image file not found' class='innerpic'>
                        
                        <div class='textblock'>
                            <span class='popuptext'>Item name:</span><br>
                                <input name='name' type='text' value='$name' maxlength='49' required><br><br>
                            
                            <span class='popuptext'>Item Price</span><br> 
                                <input name='price' type='number' value='$price' step='0.01' required><br><br>

							<span class='popuptext'>Small Quantity</span><br> 
                                <input name='small' type='number' value='$small' required><br><br>

							<span class='popuptext'>Medium Quantity</span><br> 
                                <input name='medium' type='number' value='$medium' required><br><br>

							<span class='popuptext'>Large Quantity</span><br> 
                                <input name='large' type='number' value='$large' required><br><br>

							<span class='popuptext'>XLarge Quantity</span><br> 
                                <input name='xlarge' type='number' value='$xlarge' required><br><br>
                        </div>
                        
                        <div class='line'></div>
                        
                        <textarea rows='8' cols='50' name='description' placeholder='Enter descriptive text here.'>$description</textarea>
                        
                        <input type='hidden' value='clothing' name='table'>
                        <input type='hidden' value='$item_id' name='item_id'>
                        
                        <input type='submit' value='Save' class='save'>
                        
                    </form>
                    
                </div>
            </div>

            <script>
            // Get the modal
            var modal" . $x . " = document.getElementById('$clmodelID');

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
* The line that allows the user to add an item to the clothing database.
******************************************************************************/
echo "
        <tr>
            <form method='POST' action='../scripts/admin/addItem.php'>
                
                <td><input type='submit' class='delete' value='+' 
                    style='background-color: #aad400'></td>
                <td><input class='darktext' type='text' maxlength='49' 
                    name='name' required></td>
                <td><input class='darktext' type='number' name='price' step='0.01' required></td>
				<td><input class='darktext' type='number' name='small' required></td>
				<td><input class='darktext' type='number' name='medium' required></td>
				<td><input class='darktext' type='number' name='large' required></td>
				<td><input class='darktext' type='number' name='xlarge' required></td>
                <td><input class='darktext' type='text' name='image' 
                    maxlength='19' required></td>
                <input type='hidden' name='table' value='clothing'>
            </form>            
        </tr>
    </table>
";
    
?>