<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <link id="styles" rel="stylesheet" href="../styles/admin.css">
    <link id="styles" rel="stylesheet" href="../styles/skaters.css">    
</head>   
    
<body>

    <?php 
        include "A-header.php"; 
        require "../scripts/dbsetup.php";
    ?>

    <main>
        <div class="start"></div>
        <!-------------------------------------------------------------------->
        
        <h2>Skaters</h2>  
        <div class="row2">
            <?php include "../scripts/admin/getskatersDB.php"; ?>
        </div>
        
        <!-------------------------------------------------------------------->
        
        <h2>Coaches</h2>    
        <div class="row2">
            <?php include "../scripts/admin/getcoachDB.php"; ?>
        </div>
        
        <!-------------------------------------------------------------------->
        
        <h2>Referees</h2>    
        <div class="row2">
            <?php include "../scripts/admin/getrefsDB.php"; ?>
        </div>        
        
        <!-------------------------------------------------------------------->        
        <h2>Board of Directors</h2>    
        <div class="row2">
            <?php include "../scripts/admin/getboardDB.php"; ?>
        </div>
        
        <!-------------------------------------------------------------------->        
        
    </main>
    
    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>