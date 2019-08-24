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

$boardList = $db->prepare("SELECT * FROM board ORDER BY name ASC");
$boardList->execute();

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

// Extract and prepare table from database
while($row = $boardList->fetch(PDO::FETCH_ASSOC)) {
    $board_id = $row['person_id'];
    $name = $row['name'];
    $position = $row['position'];
    $start = $row['start'];
    $contact = $row['contact'];
    $image = $row['image'];
    $description = $row['description'];

    // Display Board of Directors table information
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
            <td style='text-align: center'><button type='text' class='edit'>Edit</button></td>
        </tr>
    ";
}

// Add additional board member to database
echo "
        <tr>
            <form method='POST' action='../scripts/admin/addPerson.php'>
                
                <td><input type='submit' class='delete' value='+' style='background-color: #aad400'></td>
                <td><input class='darktext' type='text' name='name' maxlength='49' required></td>
                <td><input class='darktext' type='text' name='position' required></td>
                <td><input class='darktext' type='date' name='start' required></td>
                <td><input class='darktext' type='text' name='contact' required></td>
                <td><input class='darktext' type='text' name='image' maxlength='19' required></td>
                <input type='hidden' name='table' value='board'>
            </form>            
        </tr>
    </table>
";
    
?>