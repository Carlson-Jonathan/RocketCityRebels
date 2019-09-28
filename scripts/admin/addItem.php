<?php
/*****************************************************************************
* This script adds an item to the store or clothing table in the database.
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
        $price = test_input($_POST['price']);
    else
        echo "<p>Error Loading number!</p>";

	if(isset($_POST['quantity']))
        $quantity = test_input($_POST['quantity']);
    else
        echo "<p>Error Loading quantity!</p>";

	if(isset($_POST['small']))
    $small = test_input($_POST['small']);
		else
    echo "<p>Error Loading small quantity!</p>";

if(isset($_POST['medium']))
    $medium = test_input($_POST['medium']);
		else
    echo "<p>Error Loading medium quantity!</p>";

if(isset($_POST['large']))
    $large = test_input($_POST['large']);
		else
    echo "<p>Error Loading large quantity!</p>";

if(isset($_POST['xlarge']))
    $xlarge = test_input($_POST['xlarge']);
		else
    echo "<p>Error Loading xlarge quantity!</p>";

    if(isset($_POST['image'])) 
        $image = htmlspecialchars($_POST['image']);
    else
        echo "<p>Error Loading image!</p>";

	if(isset($_POST['table'])) 
        $table = htmlspecialchars($_POST['table']);
    else
        echo "<p>Error Loading table!</p>";

/* Test output
echo "
    name = $name<br>
    price = $price<br>
    image = $image<br>
";
*/

// Query correct table
switch($table) {
	case 'store':
	$addItem = $db->prepare("
    INSERT INTO store (name, price, quantity, image)
    VALUES ('$name', '$price', '$quantity', '$image')");
	break;
	case 'clothing':
	$addItem = $db->prepare("
    INSERT INTO clothing (name, price, small, medium, large, xlarge, image)
    VALUES ('$name', '$price', '$small', '$medium', '$large', '$xlarge', '$image')");
	break;
}
    
$addItem->execute();

header("Location: ../../pages/A-store.php");
die();	

?>