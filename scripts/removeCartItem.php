<?php
session_start();
/*****************************************************************************
* On POST remove item array from 'items' and 'clothing' Session arrays,
* deleting from Cart
*****************************************************************************/
echo '<script>window.location.href = "../pages/store.php";</script>';

if(isset($_GET['itemArray_id']))
{
	$item_id = $_GET['itemArray_id'];
	unset($_SESSION['items'][$item_id]);
}
else
    echo "<p>Error Loading item_id!</p>";

if(isset($_GET['clothingArray_id']))
{
	$item_id = $_GET['clothingArray_id'];
	unset($_SESSION['clothing'][$item_id]);
}
else
    echo "<p>Error Loading item_id!</p>";

header("Location: ../pages/store.php");
?>