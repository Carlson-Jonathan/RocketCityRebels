<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>

<body>

    <?php 
        include "A-header.php"; 
    ?>
    <style> .darktext, .lighttext {margin-left: 30px;} </style>
    
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
                <h3 style="color: #aad400">July 4, 2019 - Home vs Nashville</h3>
                <p class="lighttext">Descriptive text about the above game and stuff.
                Here, we should be allowed to rant on and on and on and on
                about blah blah blah so the people know what is going on with
                the above game. This should not screw up the format fo the page!</p><br>
                    
                <h3 style="color: #aad400">December 31, 2019 - Home vs County Line Fireballs</h3>
                <p class="lighttext">Descriptive text about the above game and stuff.
                Here, we should be allowed to rant on and on and on and on
                about blah blah blah so the people know what is going on with
                the above game. This should not screw up the format fo the page!</p><br>
            </div>
        </div>
        
    </main>
    
    <script> 
        document.getElementById("pagetitle").innerHTML = "Rebels in Action"; 
    </script>
    
    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>