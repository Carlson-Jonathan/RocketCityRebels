<?php 
/******************************************************************************
* File name:
*   getboardDB.php
* Author:
*   Jonathan Carlson
* Description:   
*   This code pulls the board table from the database, allowing it to be 
*   displayed and updated from the admin page.
******************************************************************************/

// Prepare board member table
$boardList = $db->prepare("SELECT * FROM board ORDER BY name ASC");
$boardList->execute();
$x = 1;

// Heading for table
echo "
    <table>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Position</th>
            <th>Start Date</th>
            <th>Contact</th>
            <th>Image File</th>
            <th style='text-align: center'>Description</th>
        </tr>
";

// Extract and set table variables 
while($row = $boardList->fetch(PDO::FETCH_ASSOC)) {
    $board_id = $row['person_id'];
    $name = $row['name'];
    $position = $row['position'];
    $start = $row['start'];
    $contact = $row['contact'];
    $image = $row['image'];
    $description = $row['description'];
    
    // Variables that make this page unique
    $bbtnID = "bmyBtn" . $x;
    $bmodelID = "bmyModel" . $x;   
    $bclose = "bclose" . $x;     

     /**************************************************************************
     * Displays board table by line with associated buttons.
    **************************************************************************/
    echo "
        <tr>
            <form method='POST' 
            action='../scripts/admin/removePerson.php?person_id=" . $board_id . "'>
                <td><input type='submit' class='delete' value='X'></td>
                <input type='hidden' name='table' value='board'>
            </form> 

            <td><p class='darktext'>$name</p></td>
            <td><p class='darktext'>$position</p></td>
            <td><p class='darktext'>$start</p></td>
            <td><p class='darktext'>$contact</p></td>
            <td><p class='darktext'>$image</p></td>
            <td style='text-align: center'>
            <button type='text' class='edit' id='$bbtnID'>Edit</button></td>
            
            <!-----------------------------------------------------------------
            - The pop-up that appears when the 'edit' button is clicked.
            ------------------------------------------------------------------>
            
            <div id='$bmodelID' class='modal'>
                <div class='modal-content'>
                    <span class='close' id='$bclose'>&times;</span>   
                    
                    <form method='POST' action='../scripts/admin/editPerson.php'>
                        <img src='../images/portraits/$image'
                        alt='Image file not found' class='innerpic'>
                    
                    <div class='textblock'>
                        <span class='popuptext'>Board member name:</span><br>
                            <input name='name' type='text' value='$name' maxlength='49' required><br><br>
                        <span class='popuptext'>Position:</span><br>
                            <input name='position' type='text' value='$position' maxlength='30' required><br><br>
                        <span class='popuptext'>Filler:</span><br> 
                            <input type='text' name='contact' value='$contact' maxlength='50' required><br><br>
                        <span class='popuptext'>Coach since</span><br>
                            <input type='date' name='start' value='$start' required>
                    </div>
                    
                    <div class='line'></div>
                    
                    <textarea rows='8' cols='50' name='description' placeholder='Enter descriptive text here.'>$description</textarea>

                    <input type='hidden' value='board' name='table'>
                    <input type='hidden' value='$board_id' name='person_id'>
                    
                    <input type='submit' value='Save' class='save'>
                    
                    </form>
                </div>
            </div>

            <script>
            // Get the modal
            var bmodal" . $x . " = document.getElementById('$bmodelID');

            // Get the button that opens the modal
            var bbtn" . $x . " = document.getElementById('$bbtnID');

            var bexit" . $x . " = document.getElementById('$bclose');
            
            // When the user clicks the button, open the modal 
            bbtn" . $x . ".onclick = function() {
              bmodal" . $x . ".style.display = 'block';
            }
            
            bexit" . $x . ".onclick=function() {
                bmodal" . $x . ".style.display = 'none';
            }

            </script>            
        </tr>
    ";
    $x++;
}

/******************************************************************************
* The line that allows the user to add a person to the database.
******************************************************************************/
echo "
        <tr>
            <form method='POST' action='../scripts/admin/addPerson.php'>
                
                <td><input type='submit' class='delete' value='+' 
                    style='background-color: #aad400'></td>
                <td><input class='darktext' type='text' name='name' 
                    maxlength='49' required></td>
                <td><input class='darktext' type='text' name='position' required></td>
                <td><input class='darktext' type='date' name='start' required></td>
                <td><input class='darktext' type='text' name='contact' required></td>
                <td><input class='darktext' type='text' name='image' 
                    maxlength='19' required></td>
                <input type='hidden' name='table' value='board'>
            </form>            
        </tr>
    </table>
";
    
?>