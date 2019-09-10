<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <link rel="stylesheet" href="../styles/admin.css">
    <style> .darktext, .lighttext {margin-left: 30px;} </style>
</head>
    
<body>

    <?php 
        include "A-header.php"; 
    ?>
    
    <main>
        
        <!-------------------------------------------------------------------->
        
        <h2>Weekly Rhythm</h2>
        <?php include "../scripts/admin/getPracticeDays.php"; ?>
                
        <!-------------------------------------------------------------------->
        
        <h2>Upcomming Games and Events</h2>
        <div style='width: 100%; margin: auto'>
            <div class="row">
                <?php include "../scripts/admin/getGames.php"; ?>
            </div>
        </div>
    </main>
    
    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>