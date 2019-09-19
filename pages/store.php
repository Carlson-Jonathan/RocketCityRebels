<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <title>Derby Merchandise, Gifts, Goodies and Swag: Buy Now</title> 

    <meta name="description" content="Get your Rocket City Rebel merch here at our online store and show your friends that you support the rebels and the fitness of the children of Madison, Alabama.">    
</head>
<body>

    <?php include "title-nav.php"; ?>

    <main>
        <div class="start"></div>
        
        <h2>Store heading</h2>
        <div class="row">
            <div class="columnleft" style="width: 25%">
                <img src="../images/logo.webp" class="boximage">
            </div>

            <div class="columnright" style="width: 75%">
                <p class="lighttext">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p>
            </div>
        </div>
        
        <!-------------------------------------------------------------------->

        <h2>Stuff to buy and payments and stuff</h2>    
        <div class="row2">
            <div class="columnleft2" style="width: 75%">
                <p class="lighttext">Pay Monthly Dues and Skater Insurance Securely With Paypal:</p><br>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="background-color: white; padding: 10px;">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="4QD86MJBYLUG2">
                    <table><tbody><tr><td>
                        <input type="hidden" name="on0" value="Monthly Dues"></td>
                    </tr>
                    <tr><td><select name="os0">
                        <option value="Dues: 1 Skater">Dues - 1 Skater: $35.00 USD - monthly</option>
                        <option value="Dues: 2 Skaters">Dues - 2 Skaters: $20.00</option>
                        <option value="Dues: 3 Skaters">Dues - 3 Skaters: $15.00</option>
                        <option value="Insurance: 1 Skaters">Insurance - 1 Skater: $20.00</option>
                        <option value="Insurance: 2 Skaters">Insurance - 2 Skaters: $40.00</option>
                        <option value="Insurance: 3 Skaters">Insurance - 3 Skaters: $60.00</option>

                    </select> </td></tr></tbody></table>
                    <input type="hidden" name="currency_code" value="USD" style="width: 100%"><br>
                    <input type="image" src="../images/paynow.jpeg" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" style="margin: auto; display: block; width: 100%" value="Pay Now!">
                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p><br>
                <br><br>
            </div>

            <div class="columnright2" style="width: 25%">
                <p>Lorem - ipsum dolor sit amet!
                Ipsum - consectetur adipiscing elit!</p>
                <p>Dolor - ullamco laboris nisi ut aliquip!</p>
                <p>Exercitation - nisi ut aliquip ex ea commodo consequat!<br></p><br>
                

            </div>

        </div>

        <h2>Donations</h2>    
        <div class="row">

            <div class="columnleft">
                <p class="emphasistext">Sponsors:</p><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim.</p>
            </div>

            <div class="columnright">
                
            </div>

        </div>
        
        <script>
            document.getElementById("pagetitle").innerHTML = "Rad Rebel Merch";
        </script>

    </main>

    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>