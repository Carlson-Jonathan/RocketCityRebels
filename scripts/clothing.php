<?php 
/******************************************************************************
* File names:
*   store.php, clothing.php
* Author:
*   Jonathan Carlson, Kyle Kadous
* Description:   
*   The skaters page contains 4 sections of participants as named by the files
*   shown above. Each of these sections requires a file containing the below
*   code, which accesses a specific table from the Rebels database, displays 
*   the content in the appropriate section, and generates a pop-up window on 
*   click.
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
    

    /**********************************************************************
    * Propogates and displays each element to the screen upon page load. On
    * clicking a specific element, this code will display a special CSS 
    * box which can be un-displayed by re-clicking anywhere on the screen.
    **********************************************************************/
    echo "
        <div class='gallery' id='$clbtnID'>
            <img src='../images/portraits/$image
            ' alt='Image file not found'>
        </div>

        <div id='$clmodelID' class='modal'>
            <div class='modal-content'>
                <img src='../images/store/$image
                ' alt='Image file not found' class='innerpic'>
                <div class='textblock'>
                    <span class='popuptext'>$name</span><br>
                    <span class='popuptext'>Price
                    </span><br> $price</p><br>
                    <span class='popuptext'>Small</span><br>
                    <span class='popuptext'>Medium</span><br> 
                    <span class='popuptext'>Large</span><br> 
                    <span class='popuptext'>XLarge</span><br>  
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

        // When the user clicks anywhere, close the modal
        clmodal" . $x . ".onclick=function() {
            clmodal" . $x . ".style.display = 'none';
        }

        </script>
    ";
    $x++;
}
?>