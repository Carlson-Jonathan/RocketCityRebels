<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
    
<body>

    <?php include "title-nav.php"; ?>

    <main>
        <script>
            var url = window.location.href;
            document.write(url);
        </script>        
        <div class="row">
            <div class="columnleft">
                <img src="../images/logo.webp">
            </div>

            <div class="columnright">
                <p class="emphasistext">Monthly Due Payments of $35 are due the 1st of every month (Ask about sibling discounts! Skaters Below Level 1 see the drop down for you monthly fee as well).</p><br>
                <p>For Guardians with Multiple skaters: There are 3 Options. Each Option Amount Is Shown In The Drop Down. You Will Have To Set Up An Option for Each Skater Individually. Choose Option 1 For First Skater, Then Option 2 For The Second, Etc. Also If You Are Below Level 1 And Come to Practice on Mondays Your Fee Is Listed in The Drop Down As Well. Then, No Worries! Your Payment(s) Will Auto Pay Monthly.</p>
            </div>
        </div>

        <h1 class="bar">Make a Payment For Skater Dues and Insurance</h1>    
        <div class="row">
            <div class="columnleft"><p class="emphasistext" style="text-align: center;">Pay Monthly Dues and Skater Insurance Securely With Paypal:</p><br>
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
                <br><br>
            </div>

            <div class="columnright" style="height: 350px">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p><br>
                <p>Lorem - ipsum dolor sit amet!
                Ipsum - consectetur adipiscing elit!</p>
                <p>Dolor - ullamco laboris nisi ut aliquip!</p>
                <p>Exercitation - nisi ut aliquip ex ea commodo consequat!<br></p><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><br><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            </div>

        </div>

        <h1 class="bar">Donations</h1>    
        <div class="row">

            <div class="columnleft">
                <p class="emphasistext">Sponsors:</p><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim.</p>
            </div>

            <div class="columnright">
                <p>The Rocket City Rebels are a Non-Profit, 501c3 Co-Ed Junior Roller Derby League and rely solely on our community, sponsors and donations. All jobs are run by volunteers, but there are still many expenses associated with running the league. Don't forget to request a receipt for taxes.<br><br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <br><br>Excepteur sint occaecat cupidatat non proident, sunt in culpa. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p>
            </div>

        </div>

    </main>

    <?php include "pages/footer.php"; ?>
    
</body>
    
</html>