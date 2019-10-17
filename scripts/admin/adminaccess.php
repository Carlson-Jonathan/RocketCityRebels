<?php session_start(); ?>
<?php
/*****************************************************************************
* adminaccess.php
* Author:
*   Jonathan Carlson
* Description: 
*   This file receives a $_POST password input from the admin.php page, then
*   checks its hash against the hash in the database. It it matches, the hash
*   is saved as a session variable, which will unlock the administrative 
*   pages to the user until the session is ended.
*****************************************************************************/

require ($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

// Security
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$password = test_input($_POST['password']);

// Get hash data from database
$getHash = $db->prepare("SELECT * FROM passwords");
$getHash->execute();

$row = $getHash->fetch(PDO::FETCH_ASSOC);
$hash1 = $row['hash1'];
$hash2 = $row['hash2'];

// Verify POST password input against database hash and take action if
// the correct password was input:
if (password_verify($password, $hash1) ||
    password_verify($password, $hash2)) {
    $_SESSION['pw'] = false;
    $_SESSION['access'] = true;
    header("Location: ../../pages/A-instructions.php");
    echo '<script>window.location.href = "../../pages/A-instructions.php";</script>';
} else {
    $_SESSION['pw'] = true;
    echo $_SESSION['pw'];
    header("Location: ../../pages/admin.php");
    echo '<script>window.location.href = "../../pages/admin.php";</script>';
}  
?>