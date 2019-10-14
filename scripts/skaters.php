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
$skaterPortraits = $db->prepare("SELECT * FROM skaters ORDER BY start");
$skaterPortraits->execute();
$x = 1;

while ($row = $skaterPortraits->fetch(PDO::FETCH_ASSOC)) {
    $name = $row['name'];
    $number = $row['number'];
    $dob = $row['dob'];
    $start = $row['start'];
    $description = $row['description'];
    $image = $row['image'];

    $btnID = "myBtn" . $x;
    $modelID = "myModel" . $x;
    

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
                <img src='../images/portraits/$image
                ' alt='Image file not found' class='innerpic'>
                <div class='textblock'>
                    <span class='popuptext'>Player name:
                    </span><br><p>$name</p><br>
                    <span class='popuptext'>Jersey number:
                    </span><br> $number</p><br>
                    <span class='popuptext'>Age:</span><br> 
                    " . getAge($dob) . "</p><br>
                    <p>Rebel Since " . adjust_date($start) ."</p>
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