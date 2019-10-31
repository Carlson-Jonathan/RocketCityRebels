<?php
session_start();
/******************************************************************************
* File name:
*   editCart.php
* Author:
*   Kyle Kadous
* Description:   
*   Edit a Cart item in the session array based on new qtyselected and array key
******************************************************************************/

echo '<script>window.location.href = "../pages/store.php";</script>';

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Set all variables

		
header("Location: ../pages/store.php");
?>