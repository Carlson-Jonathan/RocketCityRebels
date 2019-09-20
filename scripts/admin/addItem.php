<?php
/*****************************************************************************
* This script adds an item to the store table in the database.
***************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Set variables and run through security function
    if(isset($_POST['name']))
        $name = test_input($_POST['name']);
    else
        echo "<p>Error Loading name!</p>";

    if(isset($_POST['price']))
        $number = test_input($_POST['price']);
    else
        echo "<p>Error Loading number!</p>";

    if(isset($_POST['image'])) 
        $image = htmlspecialchars($_POST['image']);
    else
        echo "<p>Error Loading image!</p>";

/* Test output
echo "
    name = $name<br>
    price = $price<br>
    image = $image<br>
";
*/

// Query store table and insert new row
$addItem = $db->prepare("
        INSERT INTO store (name, price, image)
        VALUES ('$name', '$price', '$image')");
    
$addItem->execute();

header("Location: ../../pages/A-store.php");
die();	

?>