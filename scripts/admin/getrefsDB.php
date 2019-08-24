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

$refList = $db->prepare("SELECT * FROM referees ORDER BY name ASC");
$refList->execute();

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
            <th style='text-align: center'>Description</th>
        </tr>
";

// Extract and prepare table from database
while($row = $refList->fetch(PDO::FETCH_ASSOC)) {
    $ref_id = $row['person_id'];
    $name = $row['name'];
    $position = $row['position'];
    $start = $row['start'];
    $filler = $row['filler'];
    $image = $row['image'];
    $description = $row['description'];

    // Display referee table information
    echo "
        <tr>
            <form method='POST' 
            action='../scripts/admin/removePerson.php?person_id=" . $ref_id . "'>
                <td><input type='submit' class='delete' value='X'></td>
                <input type='hidden' name='table' value='referees'>
            </form>            
            
            <td><p class='darktext'>$name</p></td>
            <td><p class='darktext'>$position</p></td>
            <td><p class='darktext'>$start</p></td>
            <td><p class='darktext'>$filler</p></td>
            <td><p class='darktext'>$image</p></td>
            <td style='text-align: center'><button type='text' class='edit'>Edit</button></td>
        </tr>
    ";
}

// Add additional referee to database
echo "
        <tr>
            <form method='POST' action='../scripts/admin/addPerson.php'>
                
                <td><input type='submit' class='delete' value='+' style='background-color: #aad400'></td>
                <td><input class='darktext' type='text' maxlength='49' name='name' required></td>
                <td><input class='darktext' type='text' name='position' required></td>
                <td><input class='darktext' type='date' name='start' required></td>
                <td><input class='darktext' type='text' name='filler' required></td>
                <td><input class='darktext' type='text' name='image' maxlength='19' required></td>
                <input type='hidden' name='table' value='referees'>
            </form>            
        </tr>
    </table>
";
    
?>