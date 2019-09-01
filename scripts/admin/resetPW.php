<?php
/*****************************************************************************
* getBCdates.php
* Author:
*   Jonathan Carlson
* Description: 
*   This file retrives the bootcamp dates from the database and sets
*   them on the website, which can allow other content to be displayed if BC
*   is in season.
*****************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

$getBootCamp = $db->prepare("SELECT * FROM bootcamp");
$getBootCamp->execute();

while($row = $getBootCamp->fetch(PDO::FETCH_ASSOC)) {
    $dbBegin = $row['begin'];
    $dbFinish = $row['finish'];
    
    echo "
        <h2>Change Administrative Password</h2>
        <div class='row'>
            <p class='lighttext' style='font-size: 18px'>    
                To change the password that accesses this website, enter, 
                then re-enter your new password in the fields below. If for
                any reason, you forget the password or cannot access the 
                administrative site, contact Jonathan Carlson at 256-513-6210
                after sending him $50.00. <br><br>
                Note: When a password is entered into the log-in page, it is
                encrypted (scrambled) before any other pages are loaded. 
                Therefore, there is no way for anyone but the person entering
                the password to know what it is.
            </p><br>
            <p class='lighttext'>Password Requirements:<br>
                <ul class='lighttext'>
                    <li>Minimum of 8 characters</li>
                    <li>At least 1 UPPERCASE letter</li>
                    <li>At least 1 lowercase letter</li>
                    <li>At least 1 number</li>
                    <li>At least 1 symbol ( !@#$%^&* )</li>
                </ul><br>
            </p>
            <form method='POST' action='../scripts/admin/pwReset.php' 
            style='text-align: center'>
                <p class='lighttext' style='text-align: center; color: #aad400'>
                    New Password:<br>
                    <input type='password' name='begin' 
                    required pattern='(?=^.{7,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$'>
                </p><br>
                <p class='lighttext' style='text-align: center; color: #aad400'>
                    Re-enter Password:<br>
                    <input type='password' name='finish' 
                    required pattern='(?=^.{7,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$'>
                </p><br>
                <input type='submit' value='Change Password' class='save'>
            </form>
        </div>
    ";
}

?>