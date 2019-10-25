<?php
session_start();
/******************************************************************************
* File name:
*   addCart.php
* Author:
*   Kyle Kadous
* Description:   
*   Receives item information from form post submit. Stores an array into the 
*   Session items array.
******************************************************************************/

echo '<script>window.location.href = "../pages/store.php";</script>';

// Security

header("Location: ../pages/store.php");
?>