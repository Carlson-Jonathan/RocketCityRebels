<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <link id="styles" rel="stylesheet" href="../styles/skaters.css">
</head>
    
<body>

    <?php 
        include "title-nav.php"; 
        require "../scripts/dbsetup.php";
    ?>

    <main>
        <div class="start"></div>
        
        <h2>Rocket City Rebels Team 2019</h2>
        <img src="../images/teampic.jpg"><br><br>
        
        <!-------------------------------------------------------------------->
        
        <h2>Skaters</h2>    
        <div class="row2">
            <?php require "../scripts/skaters.php"; ?>
        </div>
        
        <!-------------------------------------------------------------------->        
        <h2>Coaches</h2>    
        <div class="row2">
            <?php require "../scripts/coaches.php"; ?>
        </div>
        
        <!-------------------------------------------------------------------->
        
        <h2>Jr. Referees</h2>    
        <div class="row2">
            <?php require "../scripts/referees.php"; ?>
        </div>
        
        <!-------------------------------------------------------------------->
        
        <h2>Board of Directors</h2>    
        <div class="row2">
            <?php require "../scripts/board.php"; ?>
        </div>
        
        <!-------------------------------------------------------------------->        
        <script>
            document.getElementById("pagetitle").innerHTML = "Meet the Rebels";
        </script>
    </main>

    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>