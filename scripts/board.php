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
$boardPortraits = $db->prepare("SELECT * FROM board");
$boardPortraits->execute();
$x = 1;

while ($row = $boardPortraits->fetch(PDO::FETCH_ASSOC)) {
    $name = $row['name'];
    $position = $row['position'];
    $start = $row['start'];
    $contact = $row['contact'];
    $description = $row['description'];
    $image = $row['image'];

    $bbtnID = "bmyBtn" . $x;
    $bmodelID = "bmyModel" . $x;

    /**********************************************************************
    * Propogates and displays each element to the screen upon page load. On
    * clicking a specific element, this code will display a special CSS 
    * box which can be un-displayed by re-clicking anywhere on the screen.
    **********************************************************************/

    echo "
        <div class='gallery' id='$bbtnID'>
            <img src='../images/portraits/$image
            'alt='Image file not found'>
        </div>

        <div id='$bmodelID' class='modal'>
            <div class='modal-content'>
                <img src='../images/portraits/$image
                'alt='Image file not found' class='innerpic'>

                <div class='textblock'>
                    <span class='popuptext'>
                        Member name:
                    </span><br>
                    <p>$name</p><br>

                    <span class='popuptext'>
                        Position:
                    </span>
                    <p>$position</p><br>

                    <span class='popuptext'>
                        Contact:</span><br>
                    </span>
                    <p>$contact</p><br>

                    <p>Board member since " . adjust_date($start) . "</p><br>

                </div>

                <div class='line'></div>

                <p style='margin-top: 15px; text-align: left'>
                $description</p>
            </div>
        </div>

        <script>
        // The code that displays and un-displays the modal boxes.
        
        // Get the modal
        var bmodal" . $x . " = document.getElementById('$bmodelID');

        // Get the button that opens the modal
        var bbtn" . $x . " = document.getElementById('$bbtnID');

        // When the user clicks the button, open the modal 
        bbtn" . $x . ".onclick = function() {
          bmodal" . $x . ".style.display = 'block';
        }

        bmodal" . $x . ".onclick=function() {
            bmodal" . $x . ".style.display = 'none';
        }
        </script>
    ";
    $x++;
}
?>