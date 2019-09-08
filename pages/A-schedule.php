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
        
        <div class="row">
            <div class="columnleft" style="width: 25%">
                <img src="../images/logo.webp" class="boximage">
                <div style="width: 100%; margin: auto; text-align: center">
                    <p class="darktext"></p><br>
                    <button onclick="window.location.href = 
                    'http://insanitycomplex.com/roller-derby/'" class="save">
                        Buy Home Game Tickets</button>
                </div><br>
                <p class="lighttext" style="font-size: 13px; margin: 0">
                    All home bouts are double headers with our adult sister 
                    leage, the
                    <a href="http://www.dixiederbygirls.com/" 
                       style="color: #aad400">
                        Dixie Derby Girls.
                    </a>
                </p>
            </div>
            
            <div class="columnright" style="width: 75%">
                <?php include "../scripts/admin/getGames.php"; ?>
            </div>
        </div>
    </main>
    
    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>