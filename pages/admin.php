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
        
        <h2>Skaters</h2>    
        <div class="row2">
            <?php include "../scripts/admin/getskatersDB.php"; ?>
        </div>
        
        <!-------------------------------------------------------------------->
        
        <h2>Referees</h2>    
        <div class="row2">
            <?php include "../scripts/admin/getrefsDB.php"; ?>
        </div>        
        
        <!-------------------------------------------------------------------->
        
        <h2>Coaches</h2>    
        <div class="row2">
            <?php include "../scripts/admin/getcoachDB.php"; ?>
        </div>
        
        <!-------------------------------------------------------------------->        
        <h2>Board of Directors</h2>    
        <div class="row2">
            <?php include "../scripts/admin/getboardDB.php"; ?>
        </div>
        
        <!-------------------------------------------------------------------->        
        
    </main>
    <script>
        document.getElementById("pagetitle").innerHTML = "Administrative Access";
    </script>
    
    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>