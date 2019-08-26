<?php 
/******************************************************************************
* File name:
*   getrefsDB.php
* Author:
*   Jonathan Carlson
* Description:   
*   This code pulls the referees table from the database, allowing it to be 
*   displayed and updated from the admin page.
******************************************************************************/

// Prepare referees table
$refList = $db->prepare("SELECT * FROM referees ORDER BY name ASC");
$refList->execute();
$x = 1;

// Heading for table
echo "
    <table>
        <tr>
            <th></th>
            <th>Ref Name</th>
            <th>Position</th>
            <th>Start Date</th>
            <th>Filler</th>
            <th>Image File</th>
            <th style='text-align: center'>Profile</th>
        </tr>
";

// Extract and set table variables 
while($row = $refList->fetch(PDO::FETCH_ASSOC)) {
    $ref_id = $row['person_id'];
    $name = $row['name'];
    $position = $row['position'];
    $start = $row['start'];
    $filler = $row['filler'];
    $image = $row['image'];
    $description = $row['description'];
    
    // Variables that make this page unique
    $rbtnID = "rmyBtn" . $x;
    $rmodelID = "rmyModel" . $x;   
    $rclose = "rclose" . $x;    

    /**************************************************************************
    * Displays referee table by line with associated buttons.
    **************************************************************************/
    echo "
        <tr>
            <form method='POST' 
            action='../scripts/admin/removePerson.php?person_id=" . 
            $ref_id . "'>
                <td><input type='submit' class='delete' value='X'></td>
                <input type='hidden' name='table' value='referees'>
            </form>            
            
            <td><p class='darktext'>$name</p></td>
            <td><p class='darktext'>$position</p></td>
            <td><p class='darktext'>$start</p></td>
            <td><p class='darktext'>$filler</p></td>
            <td><p class='darktext'>$image</p></td>
            <td style='text-align: center'>
            <button type='text' class='edit' id='$rbtnID'>Edit</button></td>
            
            <!-----------------------------------------------------------------
            - The pop-up that appears when the 'edit' button is clicked.
            ------------------------------------------------------------------>
            
            <div id='$rmodelID' class='modal'>
                <div class='modal-content'>
                    <span class='close' id='$rclose'>&times;</span>   
                    <form type='POST' action=''>
                        <img src='../images/portraits/$image'
                        alt='Image file not found' class='innerpic'>
                    
                    <div class='textblock'>
                        <span class='popuptext'>Referee name:</span><br>
                            <input name='name' type='text' value='$name'><br><br>
                        <span class='popuptext'>Position:</span><br>
                            <input name='position' type='text' value='$position'><br><br>
                        <span class='popuptext'>Filler:</span><br> 
                            <input type='text' name='filler' value='$filler'><br><br>
                        <span class='popuptext'>Referee since</span><br>
                            <input type='date' name='start' value='$start'>
                    </div>
                    
                    <div class='line'></div>
                    
                    <textarea rows='8' cols='50' placeholder='Enter descriptive text here.'>$description</textarea>
                    <input type='submit' value='Save' class='save'>
                    
                    </form>
                </div>
            </div>

            <script>
            // Get the modal
            var rmodal" . $x . " = document.getElementById('$rmodelID');

            // Get the button that opens the modal
            var rbtn" . $x . " = document.getElementById('$rbtnID');

            var rexit" . $x . " = document.getElementById('$rclose');
            
            // When the user clicks the button, open the modal 
            rbtn" . $x . ".onclick = function() {
              rmodal" . $x . ".style.display = 'block';
            }
            
            rexit" . $x . ".onclick=function() {
                rmodal" . $x . ".style.display = 'none';
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
                <td><input class='darktext' type='text' name='position' required></td>
                <td><input class='darktext' type='date' name='start' required></td>
                <td><input class='darktext' type='text' name='filler' required></td>
                <td><input class='darktext' type='text' name='image' 
                    maxlength='19' required></td>
                <input type='hidden' name='table' value='referees'>
            </form>            
        </tr>
    </table>
";
    
?>