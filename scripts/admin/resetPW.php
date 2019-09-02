<!-----------------------------------------------------------------------------
* resetPW.php
* Author:
*   Jonathan Carlson
* Description: 
*   This script fills the "Change Administrative Password" section on the 
*   'MISC' page of the admin website. The actual code that calls up the 
*   database, hashes the new password and save is is called by the form.
------------------------------------------------------------------------------>
<!DOCTYPE html>
<html>
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
    
    <p class='lighttext'>Password Requirements:<br></p>
        <ul class='lighttext'>
            <li>Minimum of 8 characters</li>
            <li>At least 1 UPPERCASE letter</li>
            <li>At least 1 lowercase letter</li>
            <li>At least 1 number</li>
            <li>At least 1 symbol ( !@#$%^&* )</li>
        </ul><br>

    <form method='POST' action='../scripts/admin/resetPWscr.php' 
    style='text-align: center' onsubmit=compare()>
        <p class='lighttext' style='text-align: center; color: #aad400'>
            New Password:<br>
            <input type='password' name='password' id='pw' 
            required pattern='(?=^.{7,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$'>
        </p><br>
        <p class='lighttext' style='text-align: center; color: #aad400'>
            Re-enter Password:<br>
            <input type='password' name='reentered' id='reentered' 
            required pattern='(?=^.{7,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$'>
        </p><br>
        <input type='submit' value='Change Password' class='save'>
    </form>
</div>

<script>
    function compare() {
        var password = document.getElementById('pw').value;
        var reentered = document.getElementById('reentered').value;
        
        if(password == reentered)
            alert("Password change successful!")
        else
            alert("Passwords do not match! Try again.")
    }
    
</script>

</html>