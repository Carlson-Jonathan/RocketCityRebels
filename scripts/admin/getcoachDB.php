<?php 
/******************************************************************************
* File name:
*   getcoachDB.php
* Author:
*   Jonathan Carlson
* Description:   
*   This code pulls the coaches table from the database, allowing it to be 
*   displayed and updated from the admin page.
******************************************************************************/

$coachList = $db->prepare("SELECT * FROM coaches ORDER BY name ASC");
$coachList->execute();

// Heading for table
echo "
    <table>
        <tr>
            <th></th>
            <th>Coach Name</th>
            <th>Position</th>
            <th>Filler</th>
            <th>Start Date</th>
            <th>Image File</th>
            <th style='text-align: center'>Description</th>
        </tr>
";

// Extract and prepare table from database
while($row = $coachList->fetch(PDO::FETCH_ASSOC)) {
    $name = $row['name'];
    $position = $row['position'];
    $filler = $row['filler'];
    $start = $row['start'];
    $description = $row['description'];
    $image = $row['image'];

    // Display modifiable skater table information
    echo "
        <tr>
            <td style='width: 10px'>
                <button type='text' class='delete'>X</button>
            </td>
            <td><p class='darktext'>$name</p></td>
            <td><p class='darktext'>$position</p></td>
            <td><p class='darktext'>$filler</p></td>
            <td><p class='darktext'>$start</p></td>
            <td><p class='darktext'>$image</p></td>
            <td style='text-align: center'><button type='text' class='edit'>Edit</button></td>
        </tr>
    ";
}

// Add additional player to database
echo "
        <tr>
            <td style='width: 10px'>
                <button type='text' class='delete' style='background-color: #aad400'>+</button>
            </td>
            <td><input class='darktext' type='text' maxlength='49'></td>
            <td><input class='darktext' type='text' maxlength='29'></td>
            <td><input class='darktext' type='text' maxlength='49'></td>
            <td><input class='darktext' type='date'></td>
            <td><input class='darktext' type='text' maxlength='19'></td>
    </table>
";
    
?>