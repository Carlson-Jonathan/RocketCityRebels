<?php
/*****************************************************************************
* editSponsors.php
* Author:
*   Jonathan Carlson
* Description: 
*   This file allows the admin user to add and removes sponsors from the 
*   database. 
*****************************************************************************/
require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

$getSponsors = $db->prepare("SELECT * FROM sponsors");
$getSponsors->execute();

echo "
        <h2>Add/Remove Sponsors</h2>
        <div class='row2'>
            <p class='darktext' style='font-size: 18px'>    
                Below is a list of the current sponsors and their logo image
                file name. As with the skaters page, you can upload a new
                sponsor's logo to the appropriate web folder and add them to
                the below list. Their logo will then appear in the footer on
                each page as well as be included in the 'sponsors' page.
            </p><br>
            
        <table>
            <tr>
                <th style='width: 1px'></th>
                <th>Sponsor Name:</th>
                <th>Sponsor Logo File:</th>
            </tr>
";

while($row = $getSponsors->fetch(PDO::FETCH_ASSOC)) {
    $spname = $row['name'];
    $splogo = $row['logo'];
    
    echo "
        <tr>
            <form method='POST' action='../scripts/admin/addSponsor.php?remove=true'>
                <td style='width: 1px'><input type='submit' class='delete' value='X'></td>
                <input type='hidden' name='name' value='$spname'>
            </form>
            <td>$spname</td>
            <td>$splogo</td>
        </tr>
    ";
}

echo "
        <tr>
            <form method='POST' action='../scripts/admin/addSponsor.php'>
                <td style='width: 1px'><input type='submit' class='delete' value='+' style='background-color: #aad400'></td>
                <td><input type='text' maxlength='20' name='name'></td>
                <td><input type='text' maxlength='20' name='logo'></td>
            </form>
        </tr>
    </table>
    </div>
";
?>