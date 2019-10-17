<?php 
/******************************************************************************
* File name:
*   getcoachDB.php
* Author:
*   Jonathan Carlson
* Description:   
*   This code pulls the coaches table from the database, allowing it to be 
*   displayed and updated from the skaters admin page.
******************************************************************************/

// Prepare coaches table
$coachList = $db->prepare("SELECT * FROM coaches ORDER BY name ASC");
$coachList->execute();
$x = 1;

// Heading for table
echo "
    <table>
        <tr>
            <th></th>
            <th>Coach Name</th>
            <th>Position</th>
            <th>Start Date</th>
            <th>Image File</th>
            <th style='text-align: center'>Profile</th>
        </tr>
";

// Extract and set table variables 
while($row = $coachList->fetch(PDO::FETCH_ASSOC)) {
    $coach_id = $row['person_id'];
    $name = $row['name'];
    $position = $row['position'];
    $start = $row['start'];
    $filler = $row['filler'];
    $image = $row['image'];
    $description = $row['description'];

    // Variables that make this page unique
    $cbtnID = "cmyBtn" . $x;
    $cmodelID = "cmyModel" . $x;   
    $cclose = "cclose" . $x;
    
    /**************************************************************************
    * Displays coach table by line with associated buttons.
    **************************************************************************/
    echo "
        <tr>
            <form method='POST' 
            action='../scripts/admin/removePerson.php?person_id=" . $coach_id . "'>
                <td><input type='submit' class='delete' value='X'></td>
                <input type='hidden' name='table' value='coaches'>
            </form> 

            <td><p class='darktext'>$name</p></td>
            <td><p class='darktext'>$position</p></td>
            <td><p class='darktext'>" . format_date($start) . "</p></td>
            <td><p class='darktext'>$image</p></td>
            <td style='text-align: center'>
            <button type='text' class='edit' id='$cbtnID'>Edit</button></td>

            <!-----------------------------------------------------------------
            - The pop-up that appears when the 'edit' button is clicked.
            ------------------------------------------------------------------>
            
            <div id='$cmodelID' class='modal'>
                <div class='modal-content'>
                    <span class='close' id='$cclose'>&times;</span>   
                    <form method='POST' action='../scripts/admin/editPerson.php'>
                        <img src='../images/skaterspage/portraits/$image'
                        alt='Image file not found' class='innerpic'>
                    
                    <div class='textblock'>
                        <span class='popuptext'>Coach name:</span><br>
                            <input name='name' type='text' value='$name' maxlength='49' required><br><br>
                        <span class='popuptext'>Position:</span><br>
                            <input name='position' type='text' value='$position' maxlength='30' required><br><br>
                        <span class='popuptext'>Coach since</span><br>
                            <input type='date' name='start' value='$start' required>
                    </div>
                    
                    <div class='line'></div>
                    
                    <textarea rows='8' cols='50' name='description' placeholder='Enter descriptive text here.'>$description</textarea>

                    <input type='hidden' value='coaches' name='table'>
                    <input type='hidden' value='$coach_id' name='person_id'>
                    
                    <input type='submit' value='Save' class='save'>
                    
                    </form>
                </div>
            </div>

            <script>
            // Get the modal
            var cmodal" . $x . " = document.getElementById('$cmodelID');

            // Get the button that opens the modal
            var cbtn" . $x . " = document.getElementById('$cbtnID');

            // Get the button for the 'X' to close the modal
            var cexit" . $x . " = document.getElementById('$cclose');
            
            // When the user clicks the button, open the modal 
            cbtn" . $x . ".onclick = function() {
              cmodal" . $x . ".style.display = 'block';
            }
            
            cexit" . $x . ".onclick=function() {
                cmodal" . $x . ".style.display = 'none';
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
                <td><input class='darktext' type='text' 
                    name='position' required></td>
                <td><input class='darktext' type='date' name='start' required></td>
                <td><input class='darktext' type='text' name='image' 
                    maxlength='19' required></td>
                <input type='hidden' name='table' value='coaches'>
            </form>            
        </tr>
    </table>
";
    
?>