<?php 
/******************************************************************************
* File name:
*   getskatersDB.php
* Author:
*   Jonathan Carlson
* Description:   
*   This code pulls the skaters table from the database, allowing it to be 
*   displayed and updated from the admin page.
******************************************************************************/

// Prepare skaters table
$skaterList = $db->prepare("SELECT * FROM skaters ORDER BY name ASC");
$skaterList->execute();
$x = 1;

// Heading for table
echo "
    <table>
        <tr>
            <th></th>
            <th>Skater Name</th>
            <th style='width: 75px'>Number</th>
            <th>Birthday</th>
            <th>Start Date</th>
            <th>Image File</th>
            <th style='text-align: center'>Profile</th>
        </tr>
";

// Converts the SQL date to mm/dd/yyyy format instead of yyyy/dd/mm
// This function delcaration rolls over to getrefsDB, getcoachDB and getboardDB
function format_date($dt) {
    $date = date_create($dt);
    $format = date_format($date, "m/d/Y");
    return $format;
}

// Extract and prepare table from database
while($row = $skaterList->fetch(PDO::FETCH_ASSOC)) {
    $player_id = $row['person_id'];
    $name = $row['name'];
    $number = $row['number'];
    $dob = $row['dob'];
    $start = $row['start'];
    $description = $row['description'];
    $image = $row['image'];
    
    // Variables that make this page unique
    $btnID = "myBtn" . $x;
    $modelID = "myModel" . $x;
    $close = "close" . $x;

    /**************************************************************************
    * Displays skaters table by line with associated buttons.
    **************************************************************************/
    echo "
    
        <tr>
            <form method='POST' 
            action='../scripts/admin/removePerson.php?person_id=" . $player_id . "'>
                <td><input type='submit' class='delete' value='X'></td>
                <input type='hidden' name='table' value='skaters'>
            </form>
            
            <td><p class='darktext'>$name</p></td>
            <td><p class='darktext'>$number</p></td>
            <td><p class='darktext'>" . format_date($dob) . "</p></td>
            <td><p class='darktext'>" . format_date($start) . "</p></td>
            <td><p class='darktext'>$image</p></td>
            <td style='text-align: center'>
            <button type='text' class='edit' id='$btnID'>Edit</button></td>
            
            <!-----------------------------------------------------------------
            - The pop-up that appears when the 'edit' button is clicked.
            ------------------------------------------------------------------>
            <div id='$modelID' class='modal'>
                <div class='modal-content'>
                    <span class='close' id='$close'>&times;</span>
                    
                    <form method='POST' action='../scripts/admin/editPerson.php'>
                        
                        <img src='../images/portraits/$image' alt='Image file not found' class='innerpic'>
                        
                        <div class='textblock'>
                            <span class='popuptext'>Player name:</span><br>
                                <input name='name' type='text' value='$name' maxlength='49' required><br><br>
                            
                            <span class='popuptext'>Jersey number:</span><br> 
                                <input name='number' type='number' value='$number' required><br><br>
                            
                            <span class='popuptext'>Birthday:</span><br> 
                                <input type='date' name='dob' value='$dob' required><br><br>
                            
                            <span class='popuptext'>Rebel Since</span><br>
                                <input type='date' name='start' value='$start' required><br>
                        </div>
                        
                        <div class='line'></div>
                        
                        <textarea rows='8' cols='50' name='description' placeholder='Enter descriptive text here.'>$description</textarea>
                        
                        <input type='hidden' value='skaters' name='table'>
                        <input type='hidden' value='$player_id' name='person_id'>
                        
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
* The line that allows the user to add a person to the database.
******************************************************************************/
echo "
        <tr>
            <form method='POST' action='../scripts/admin/addPerson.php'>
                
                <td><input type='submit' class='delete' value='+' 
                    style='background-color: #aad400'></td>
                <td><input class='darktext' type='text' maxlength='49' 
                    name='name' required></td>
                <td><input class='darktext' type='number' name='number' required></td>
                <td><input class='darktext' type='date' name='dob' required></td>
                <td><input class='darktext' type='date' name='start' required></td>
                <td><input class='darktext' type='text' name='image' 
                    maxlength='19' required></td>
                <input type='hidden' name='table' value='skaters'>
            </form>            
        </tr>
    </table>
";
    
?>