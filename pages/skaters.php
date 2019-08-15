<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <link id="styles" rel="stylesheet" href="../styles/skaters.css">
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
        
            <?php
                $skaterPortraits = $db->prepare("SELECT * FROM skaters");
                $skaterPortraits->execute();

                while ($row = $skaterPortraits->fetch(PDO::FETCH_ASSOC)) {
                    $name = $row['name'];
                    $number = $row['number'];
                    $dob = $row['dob'];
                    $start = $row['start'];
                    $description = $row['description'];
                    $image = $row['image'];

                    echo "
                        <div class='gallery' id='myBtn'>
                            <img src='../images/portraits/$image' alt='Image file not found'>
                        </div>
                        
                        <div id='myModal' class='modal'>
                            <div class='modal-content'>
                                <span class='close'>&times;</span>
                                <img src='../images/portraits/$image' alt='Image file not found'>
                                <p>Player name: $name</p>
                                <p>Jersy number: $number</p>
                                <p>Age: $dob</p>
                                <p>Rebel Since $start</p>
                                <p>About $name:<br> $description</p>
                            </div>
                        </div>
                    ";
                }
            ?>
        </div>
        
        <!-------------------------------------------------------------------->        

        <h2>Coaches</h2>    
        <div class="row">
            <div class="columnleft">
                <p class="lighttext">Lorem ipsum dolor sit amet, consectetur 
                    adipiscing elit, sed do eiusmod tempor incididunt ut labore 
                    et dolore magna Ut enim ad minim veniam, quis nostrud 
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo 
                    consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit 
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
                    occaecat cupidatat non proident, sunt in culpa.
            </div>

            <div class="columnright">
                <img class="boximage" src="../images/logo.webp">
                <p class="lighttext">Lorem ipsum dolor sit amet, consectetur 
                    adipiscing elit, sed do eiusmod tempor incididunt ut labore 
                    et dolore magna aliqua. </p>
            </div>
        </div>
        
        
        
        <!-------------------------------------------------------------------->
        
        <h2>Jr. Referees</h2>    
        <div class="row2">
            <div class="columnleft">
                <p class="darktext">Lorem ipsum dolor sit amet, consectetur 
                    adipiscing elit, sed do eiusmod tempor incididunt ut labore 
                    et dolore magna Ut enim ad minim veniam, quis nostrud 
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo 
                    consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit 
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
                    occaecat cupidatat non proident, sunt in culpa.
            </div>

            <div class="columnright">
                <img class="boximage" src="../images/logo.webp">
                <p class="darktext">Lorem ipsum dolor sit amet, consectetur 
                    adipiscing elit, sed do eiusmod tempor incididunt ut 
                    labore et dolore magna aliqua.</p>
            </div>
        </div> 
        <!-------------------------------------------------------------------->
        
        <h2>Board of Directors</h2>    
        <div class="row">
            <div class="columnleft2">
                <img class="boximage" src="../images/logo.webp">
                    aliqua. Ut enim ad minim veniam, quis nostrud.
                    <p class="lighttext">Lorem 
                    ipsum dolor sit amet, consectetur adipiscing elit, sed 
                    do eiusmod tempor incididunt ut labore et dolore magna 
                    aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            </div>

            <div class="columnright2">
                <p class="lighttext">Flowery statement about how wonderful 
                    the staff is (especially the treasurer and her husband. 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna 
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit 
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
                    occaecat cupidatat non proident, sunt in culpa.</p>
                <p class="lighttext">Ut enim ad minim veniam, quis nostrud 
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo 
                    consequat. Duis aute irure dolor in reprehenderit in 
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
            </div>
        </div>
        
        <!-------------------------------------------------------------------->        
        
        <script src="../scripts/skaters.js"></script>

        <script>
            document.getElementById("pagetitle").innerHTML = "Meet the Rebels";
        </script>
    </main>

    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>