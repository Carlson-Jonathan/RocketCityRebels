<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <link id="styles" rel="stylesheet" href="../styles/admin.css">
</head>   
    
<body>

    <?php 
        include "A-header.php"; 
        require "../scripts/dbsetup.php";
    ?>

    <main>
        <div class="start"></div>
        
        <!-------------------------------------------------------------------->
        
            <?php include "../scripts/admin/getBCdates.php"; ?>
        
        <!-------------------------------------------------------------------->
        
            <?php include "../scripts/admin/resetPW.php"; ?>
        
        <!-------------------------------------------------------------------->        
            <?php include "../scripts/admin/editSponsors.php"; ?>
        
        <!-------------------------------------------------------------------->        
    </main>

    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>