<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <title>Roller Skaters | Coaches | Referees: Meet The Team – Rocket City Rebels</title> 

    <meta name="description" content="Meet our team: The Rocket City Rebels. Read bios for skater, coaches, referees, and even our board of directors’ and see why they love roller derby."> 
    <link id="styles" rel="stylesheet" href="../styles/skaters.css">
</head>
    
<body>

    <?php 
        include "title-nav.php"; 
        require "../scripts/dbsetup.php";
    
        // Sets dates to read "Month YYYY" format. Used in all sections.
        function adjust_date($dt) {
            $date = date_create($dt);
            $format = date_format($date, "F Y");
            return $format;
        }
    
    // Calculates age "YY" from date of birth
    function getAge($then) {
        $then_ts = strtotime($then);
        $then_year = date('Y', $then_ts);
        $age = date('Y') - $then_year;
        if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
        return $age;
    }
    
    ?>

    <main>
        <h2 style="padding-bottom: 10px">Rocket City Rebels Team</h2>
        <img src="../images/skaterspage/TeamPicture.jpg" style="width: 100%"><br><br>
        
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