<?php
/*****************************************************************************
* resetPWscr.php
* Author:
*   Jonathan Carlson
* Description: 
*   This is the POST script to resetPW.php which verifies, hashes, then sets 
*   the new user defined password.
*****************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

echo '<script>window.location.href = "../../pages/A-misc.php";</script>';

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Get POST variables
$password = test_input($_POST['password']);
$reentered = test_input($_POST['reentered']);

// Verify inputs and set if match
if($password == $reentered) {
    echo "<script>alert('It worked! $password == $reentered!');</script>";
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sethash = $db->prepare("UPDATE passwords SET hash1='$hash' 
        WHERE id=1");
    $sethash->execute();
}

header("Location: ../../pages/A-misc.php");
die();	
?>