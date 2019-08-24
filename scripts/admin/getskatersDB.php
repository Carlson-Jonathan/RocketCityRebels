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

$skaterList = $db->prepare("SELECT * FROM skaters ORDER BY name ASC");
$skaterList->execute();

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
            <th style='text-align: center'>Description</th>
        </tr>
";

// Extract and prepare table from database
while($row = $skaterList->fetch(PDO::FETCH_ASSOC)) {
    $name = $row['name'];
    $number = $row['number'];
    $dob = $row['dob'];
    $start = $row['start'];
    $description = $row['description'];
    $image = $row['image'];

    // Display skater table information
    echo "
        <tr>
            <td style='width: 10px'>
                <button type='text' class='delete'>X</button>
            </td>
            <td><p class='darktext'>$name</p></td>
            <td><p class='darktext'>$number</p></td>
            <td><p class='darktext'>$dob</p></td>
            <td><p class='darktext'>$start</p></td>
            <td><p class='darktext'>$image</p></td>
            <td style='text-align: center'>
                <button type='text' class='edit'>Edit</button>
            </td>
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
            <td><input class='darktext' type='number' style='width: 75px'></td>
            <td><input class='darktext' type='date'></td>
            <td><input class='darktext' type='date'></td>
            <td><input class='darktext' type='text' maxlength='19'></td>
    </table>
";
    
?>