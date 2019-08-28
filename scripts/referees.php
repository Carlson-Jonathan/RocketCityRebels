<?php 
/******************************************************************************
* File names:
*   skaters.php, coaches.php, referees.php, board.php
* Author:
*   Jonathan Carlson
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
$refereePortraits = $db->prepare("SELECT * FROM referees");
$refereePortraits->execute();
$x = 1;

while ($row = $refereePortraits->fetch(PDO::FETCH_ASSOC)) {
    $name = $row['name'];
    $position = $row['position'];
    $start = $row['start'];
    $filler = $row['filler'];
    $description = $row['description'];
    $image = $row['image'];

    $rbtnID = "rmyBtn" . $x;
    $rmodelID = "rmyModel" . $x;

    /**********************************************************************
    * Propogates and displays each element to the screen upon page load. On
    * clicking a specific element, this code will display a special CSS 
    * box which can be un-displayed by re-clicking anywhere on the screen.
    **********************************************************************/
    
    echo "
        <div class='gallery' id='$rbtnID'>
            <img src='../images/portraits/$image
            'alt='Image file not found'>
        </div>

        <div id='$rmodelID' class='modal'>
            <div class='modal-content'>
                <img src='../images/portraits/$image
                'alt='Image file not found' class='innerpic'>

                <div class='textblock'>
                    <span class='popuptext'>
                        Referee name:
                    </span><br>
                    <p>$name</p><br>

                    <span class='popuptext'>
                        Position:
                    </span>
                    <p>$position</p><br>

                    <span class='popuptext'>
                        Filler:</span><br>
                    </span>
                    <p>$filler</p><br>

                    <p>Referee since " . adjust_date($start) . "</p><br>

                </div>

                <div class='line'></div>

                <p style='margin-top: 15px; text-align: left'>
                $description</p>
            </div>
        </div>

        <script>
        // The code that displays and un-displays the modal boxes.
        
        // Get the modal
        var rmodal" . $x . " = document.getElementById('$rmodelID');

        // Get the button that opens the modal
        var rbtn" . $x . " = document.getElementById('$rbtnID');

        // When the user clicks the button, open the modal 
        rbtn" . $x . ".onclick = function() {
          rmodal" . $x . ".style.display = 'block';
        }

        rmodal" . $x . ".onclick=function() {
            rmodal" . $x . ".style.display = 'none';
        }
        </script>
    ";
    $x++;
}
?>