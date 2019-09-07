<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>

<body>

    <?php include "title-nav.php"; 
        require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

        $getpracticedays = $db->prepare("SELECT * FROM practicedays");
        $getpracticedays->execute();
    ?>
    
    <style> .darktext, .lighttext {margin-left: 30px;} </style>
    
    <main>
        
        <h2>Weekly Rhythm</h2>
        <div class="row2">
            
            <div class="columnleft" style="width: 25%">
                <img src="../images/logo.webp" class="boximage">
                <img src="../images/logo.webp" class="boximage">
                <img src="../images/logo.webp" class="boximage">
            </div>
            
            <div class="columnright" style="width: 75%">
                <h3 style="color: #251010">Practice Schedule</h3>
                
            <?php 
                while ($row = $getpracticedays->fetch(PDO::FETCH_ASSOC)) {
                    $day = $row['day'];
                    $begin = $row['begin'];
                    $stop = $row['stop'];
                    echo "
                
                    <p class='darktext'>$day from $begin to $stop<br>
                    ";
                }
            ?>
                <br>
                <h3 style="color: #251010">Upcomming Changes to Weekly Schedule</h3>
                <p class="darktext">08/06/2019 - Monday practice moved to Tuesday</p>
                <p class="darktext">12/01/2019 - Practice Cancelled due to weather</p>
                <p class="darktext">02/08/2020 - Practice Cancelled due zombie apocolypse</p><br><br>
                
                <h3 style="color: #251010">Practice Location</h3>
                <p class="darktext">Insanity Skate Complex - Madison, Al<br><br>
                <div style="width: 100%"><iframe width="75%" height="400" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=100%20skate%20park%20drive%2C%20madison%2C%20al%2035758+(Insanity%20Complex)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/coordinates.html">gps coordinates finder</a></iframe></div><br />
            </div>
        </div>
                
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