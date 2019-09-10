<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>

<body>

    <?php 
        include "title-nav.php"; 
        require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');

        $getpracticedays = $db->prepare("SELECT * FROM practicedays");
        $getGames = $db->prepare("SELECT * FROM games ORDER BY day");
        $getScheduleChanges = $db->prepare("SELECT * FROM schedulechanges");
        $getGPS = $db->prepare("SELECT * FROM gps");
        $getpracticedays->execute();
        $getGames->execute();
        $getScheduleChanges->execute();
        $getGPS->execute();
    
        // Changes format of dates to display mm/dd/YYYY
        function format_date($dt) {
            $date = date_create($dt);
            $format = date_format($date, "M d, Y");
            return $format;
        }
    ?>
    
    <main>
        
        <!-------------------------------------------------------------------->
        
        <h2>Weekly Rhythm</h2>
        <div class="row2">
            
            <div class="columnleft2">
                <img src="../images/logo.webp" class="boximage">
                <img src="../images/logo.webp" class="boximage">
                <img src="../images/logo.webp" class="boximage">
            </div>
            
            <div class="columnright2">
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
            <div class='line'></div>
            <h3 style="color: #251010">
                Upcomming Changes to Weekly Schedule
            </h3><br>
            <?php 
                while ($row = $getScheduleChanges->fetch(PDO::FETCH_ASSOC)) {
                    $day = $row['day'];
                    $description = $row['description'];
                    echo "
                        <p class='darktext'><span style='font-weight: 700'>" . format_date($day) . "</span><br>$description</p><br>
                    ";
                }
            ?>                       
            <div class='line'></div><br>

            <!-- Google GPS map -->    
            <h3 style="color: #251010">Practice Location</h3>
            <div id='mapcontainer'>
                
            <?php 
                $row = $getGPS->fetch(PDO::FETCH_ASSOC); 
                    $gps = $row['gps'];
                echo $gps;
            ?>  
                
            </div>
            </div>
        </div>
                
        <!-------------------------------------------------------------------->
        
        <h2>Upcomming Games and Events</h2>
        <div class="row">
            <div class="columnleft2">
                <img src="../images/logo.webp" class="boximage">
                <div style="width: 100%; margin: auto; text-align: center">
                <p class="darktext"></p>
                    <button onclick="window.location.href = 
                    'http://insanitycomplex.com/roller-derby/'" class="save">
                        Buy Home Game Tickets</button>
                </div>
                    <p class="lighttext" style="font-size: 13px; text-align: center; width: 200px; margin: auto">
                        All home bouts are double headers with our adult sister 
                        leage, the
                        <a href="http://www.dixiederbygirls.com/" 
                           style="color: #aad400">
                            Dixie Derby Girls.
                        </a>
                    </p>
                </div><br>
            
            <div class="columnright2">

            <?php 
                
                while ($row = $getGames->fetch(PDO::FETCH_ASSOC)) {
                    $day = format_date($row['day']);
                    $title = $row['title'];
                    $description = $row['description'];
                    echo "
                        <h3 style='color: #aad400'>$day - $title</h3>
                        <p class='lighttext'>$description</p><br>
                        <div class='line' style='border-bottom: solid #aad400 1px'></div>
                    ";
                }
            ?>
                
            </div>
        </div>
        
    </main>
    
    <script> 
        document.getElementById("pagetitle").innerHTML = "Rebels in Action"; 
    </script>
    
    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>