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
        
        <!-------------------------------------------------------------------->

        <h2>Stuff to buy and payments and stuff</h2>    
        <div class="row2">
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