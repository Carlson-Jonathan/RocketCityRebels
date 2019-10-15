<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <title>Sponsors and Advertising: Get Your Business Noticed Now</title> 

    <meta name="description" content="Advertise your business by sponsoring the Rocket City Rebels. Get your logo seen on our website, game banners, fliers, and during game announcements."> 
</head>    
<body>

    <?php 
        require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');
        $displaySponsors = $db->prepare("SELECT logo FROM sponsors");
        $displaySponsors->execute();
        include "title-nav.php"; 
    ?>

    <main>
        <h2>Welcome Sponsors!</h2>
        <div class="row">
            <div class="columnleft">
                <h3 style='color: #aad400'>Advertise today!</h3>
                <p class='lighttext'>
                    Get your business noticed by sponsoring
                    the Rocket City Rebels Roller Derby team! Chose from one of
                    our 5 advertisment packages or create a tailored sponsorship
                    that is right for you. Contact our board of 
                    directors today to take advantage of our promotions.</p><br>
                <h3 style="color: #aad400">Current Sponsors:</h3>
                <?php
                    while($row = $displaySponsors->fetch(PDO::FETCH_ASSOC)) {
                        $logo = $row['logo'];

                        echo "<img alt='logo file not found'
                        src='../images/sponsors/$logo' class='spLogos' style='min-width: 32%; margin: auto; padding: 10px; height:auto'> ";
                    }
                ?>
            
            </div>
            <div class="columnright">
                <img src='../images/sponsors/huddle.jpg' style="width: 100%; margin: 20px 0; border-radius: 15px; border: solid #aad400 1px">
            </div>
        </div>
        
        <!-------------------------------------------------------------------->

        <h2>Advertisment Packages</h2>    
        <div class="row2">
            <div class="columnleft2 phonehide">
                <img src='../images/sponsors/Sat5.jpg' style="width: 100%; margin-top: 415px">
            </div>

            <div class="columnright2">
                <h3>Individual Bout Advertisements:</h3>
                <ul>
                    <li>1/4 Page Advertisement in Bout Program - $15</li>
                    <li>1/2 Page Advertisement in Bout Program - $25</li>
                    <li>Full Page Advertisement in Bout Program - $40</li>
                    <li>Set up your own vendor table - $30</li>
                </ul>
                
                <div class='line'></div>
                
                <h3 style='color: darkgreen'>High Roller - <span style='font-size: 16px'>$2,000 per year</span></h3>
                <ul>
                    <li>Full Page in Each Home Bout Program</li>
                    <li>5 Shout Outs at Each Home Bout</li>
                    <li>8.5' X 2' Banner Hung at Each Home Bout</li>
                    <li>1 Radio Style Commercial Read at Each Bout</li>
                    <li>VIP Rebels Shirts</li>
                    <li>Honaray Rebels Jersey</li>
                    <li>2 Season Passes to all Home Bouts</li>
                    <li>2 VIP Tickets to Chosen Home Bouts</li>
                    <li>Social Media Shout Outs Leading Up to Each Home Bout</li>
                    <li>Embroidered Logo Patch on Each Skater's Jersy</li>
                </ul>
                
                <div class='line'></div>
                
                <h3 style='color: darkgreen'>MVP - <span style='font-size: 16px'>$900 per year</span></h3>
                <ul>
                    <li>1/2 Page in Each Home Bout Program</li>
                    <li>3 Shout Outs at Each Home Bout</li>
                    <li>VIP Rebels Shirts</li>
                    <li>8.5' X 2' Banner Hung at Each Home Bout</li>
                    <li>1 Radio Style Commercial Read at Each Bout</li>
                    <li>Social Media Shout Outs Leading Up to Each Home Bout</li>
                    <li>Business Cards Placed at Each VIP Table</li>
                    <li>2 VIP Tickets to Chosen Home Bouts</li>
                </ul>
                
                <div class='line'></div>
                
                <h3 style='color: darkgreen'>Lead Jammer - <span style='font-size: 16px'>$600 per year</span></h3>
                <ul>
                    <li>Full Page in Bout Program</li>
                    <li>4 Shout Outs at Each Home Bout</li>
                    <li>VIP Rebels Shirts</li>
                    <li>Social Media Shout Outs Leading Up to Each Home Bout</li>
                    <li>Logo on Bout Poster and All Printed Bout Material</li>
                    <li>Advertisement Table Provided at Bout</li>
                    <li>1 Radio Style Commercial Read at Each Bout</li>
                    <li>Banner Hung at Bout</li>
                    <li>2 VIP Tickets to Chosen Home Bouts</li>
                </ul>
                
                <div class='line'></div>
               
                <h3 style='color: darkgreen'>Pivot - <span style='font-size: 16px'>$150 per Bout</span></h3>
                <p>Choose between 3 Pivot packages:</p><br>
                <ul>
                    <li>Sponosr the Penalty Box</li>
                    <li>Sponsor the "Ask Me About Derby" Signs</li>
                    <li>Sponsor the rebel Mascot, "Rebel Reptar"</li>
                </ul><br>
                <p>All pivot levels include minimum perks plus logos on signs. All signs will be highly visible throughout the bout.</p>
                
                <div class='line'></div>
                
                <h3 style='color: darkgreen'>The Pack - <span style='font-size: 16px'>$100 per Bout, $500 per Year</span></h3>
                <ul>
                    <li>1/4 Page Ad in Bout Programs</li>
                    <li>2 Additional Shouts at Home Bouts</li>
                    <li>Shout Out During Each Power Jam</li>
                    <li>VIP Rebels Shirt</li>
                    <li>Your Logo Prominently Displayed</li>
                </ul>
            </div>
        </div>
        
        <script>
            document.getElementById("pagetitle").innerHTML = "Support Your Rebels";
        </script>        

    </main>

    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>