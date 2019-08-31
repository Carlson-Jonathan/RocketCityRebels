<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <link id="styles" rel="stylesheet" href="../styles/admin.css">
</head>   
    
<body>

    <?php 
        include "title-nav.php"; 
        require "../scripts/dbsetup.php";
    ?>

    <main>
        <div class="start"></div>
        <!-------------------------------------------------------------------->
        
            <?php include "../scripts/admin/getBCdates.php"; ?>
        
        <!-------------------------------------------------------------------->        
        
    </main>
    <script>
        document.getElementById("pagetitle").innerHTML = "Administrative Access";
    </script>
    
    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>