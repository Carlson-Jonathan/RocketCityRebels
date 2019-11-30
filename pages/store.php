<?php 
     session_start();
?>
<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <title>Derby Merchandise, Gifts, Goodies and Swag: Buy Now</title> 

    <meta name="description" content="Get your Rocket City Rebel merch here at our online store and show your friends that you support the rebels and the fitness of the children of Madison, Alabama.">    
	<link id="styles" rel="stylesheet" href="../styles/skaters.css">
	<link id="styles" rel="stylesheet" href="../styles/store.css">
</head>
<body>

    <?php include "title-nav.php";
	require "../scripts/dbsetup.php"; 
	 // starting the session
	session_start();

	?>

    <main>
        <div class="start"></div>
        
        <h2>Store Heading</h2>
        <div class="row">
            <div class="columnleft" style="width: 25%">
                <img src="../images/logo.webp" class="boximage">
            </div>

            <div class="columnright" style="width: 75%">
                <p class="lighttext">Rebel Store Coming Soon!</p>
            </div>
        </div>
		<h2>Monthly Dues</h2>
		<div class="row">
			<div class="columnright" style="width: 75%">
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="K6CGBB6UB6SS4">
					<table>
					<tr><td><input type="hidden" name="on0" value="Number of Skaters">Number of Skaters</td></tr><tr><td><select name="os0">
					   <option value="1 Skater">1 Skater $35.00 USD</option>
					   <option value="2 Skaters">2 Skaters $55.00 USD</option>
					   <option value="3 Skaters">3 Skaters $70.00 USD</option>
					</select> </td></tr>
					<tr><td><input type="hidden" name="on1" value="List of skater names">List of skater names</td></tr><tr><td><input type="text" name="os1" maxlength="200"></td></tr>
					</table>
					<input type="hidden" name="currency_code" value="USD">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
			</div>
		</div>
        
        <!-------------------------------------------------------------------->
		
        <h2>Stuff to buy and payments and stuff</h2>    
        <div class="row2">
			<?php require "../scripts/getCart.php"; ?>
            <?php require "../scripts/store.php"; ?>
        </div>
		
        <!-------------------------------------------------------------------->

        <div class="row2">
            <?php require "../scripts/clothing.php"; ?>
        </div>

        <!-------------------------------------------------------------------->

        </div>
        
        <script>
            document.getElementById("pagetitle").innerHTML = "Rad Rebel Merch";

			document.getElementById('shoppingCart').innerHTML = "<div id='cartDiv'><button id='shoppingCart' class='cartBtn'><span class='cart'></span>Cart</div>";
        </script>

    </main>

    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>