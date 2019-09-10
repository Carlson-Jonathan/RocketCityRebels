<!DOCTYPE HTML>  
<html lang="en-US">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<?php include "head.php"; ?>
    
<body>

    <?php 
        include "title-nav.php"; 
    
        require($_SERVER['DOCUMENT_ROOT'].'/scripts/dbsetup.php');
        $getBC = $db->prepare("SELECT * FROM bootcamp");
        $getEnroll = $db->prepare("SELECT * FROM enroll");
        $getBC->execute();
        $getEnroll->execute();
        
        $BC = $getBC->fetch(PDO::FETCH_ASSOC);
        $ER = $getEnroll->fetch(PDO::FETCH_ASSOC);
        $begin = $BC['begin'];
        $finish = $BC['finish'];
        $bcurl = $ER['url'];
    
        function format_date($dt) {
            $date = date_create($dt);
            $format = date_format($date, "F d");
            return $format;
        }
    
        $finish = format_date($finish);
    ?>

    <main>
        
        <!-------------------------------------------------------------------->
        
        <div class="embed-responsive embed-responsive-16by9" id="movie">
            <iframe src="https://www.youtube.com/embed/a4Jcieddb60" 
                    frameborder="0" allow="accelerometer; encrypted-media; 
                    gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        
        <!-------------------------------------------------------------------->
        
        <h2>What We Do</h2>    
        <div class="row2">
            <div class="columnleft2">
                <img class="boximage" src="../images/derbygirl.jpg">
            </div>

            <div class="columnright2">
                <p class="darktext">
                    Established in 2011 the Rocket City Rebels is Alabama’s 
                    first Junior Roller Derby team.  We are a co-ed team with 
                    skaters ranging from 8-18 years old who are dedicated to 
                    learning the sport.  We pride ourselves on building healthy 
                    bodies, minds and lifestyles for our skaters on and off the 
                    track.  Our coaches teach skaters respect not only 
                    themselves but their teammates, coaches, officials, fans 
                    and opponents. Roller derby is an inclusive sport that is 
                    open to players of all shapes, sizes, and athletic 
                    abilities. <br><br>
                    
                    The Rebels practice twice a week on Mondays and Wednesdays 
                    from 6-8pm at Insanity complex. (100 Skate Park drive 
                    Madison Al, 35758).  Mondays are dedicated to skill and 
                    strength building drills and exercises while Wednesdays are 
                    set aside for Scrimmaging and game play practice. <br><br>
                    
                    Home games are typically played once a month from March 
                    through August. Most games are played by the “Charter” 
                    team (high level more experience players)  but we build 1 
                    or 2 team mixers per season that all skaters are invited 
                    to participate in.
                </p>
 
            </div>
        </div>
        
        <!-------------------------------------------------------------------->        

        <h2>How to Join</h2>    
        <div class="row">
            <div class="columnleft" id='offseason'>
                <p class="lighttext">
                    The Rocket City Rebels hosts a 4-day Boot Camp once a year 
                    in the fall. Boot camp dates will be announced on our 
                    facebook page and will be listed on our 
                    <a href="../pages/schedule.php">schedule page</a>. During 
                    this camp new skaters will be taught how to skate derby style 
                    and learn the basic rules of derby.  At the end of bootcamp 
                    all participants will be offered the opportunity to join the 
                    team.  After boot camp we typically offer open enrollment from 
                    October through January. 
                    <br><br>

                    If you miss Boot Camp and still wish to join during open 
                    enrollment, please contact us to 
                    schedule a skating evaluation with a coach for training 
                    placement. <br><br>
                    
                    During game season (February - September) we do not accept 
                    new players but will make exceptions for transfer players from other 
                    teams and highly skilled skaters who do not require basic 
                    skills training.  Skaters wishing an exception may contact 
                    us below to schedule an evaluation.
            </div>
            <div class='columnleft' id='onseason'>
                <h3 style='color: #aad400'>Boot camp season is here!</h3>
                <p class="lighttext">
                    From now until <?php echo "$finish"; ?> (the first day of boot camp), the Rebels will be accepting enrollment applications! During boot camp, new skaters will be taught how to skate derby style, learn skating safety techniques, and learn the basic rules of derby. At the end of bootcamp all participants will be offered the opportunity to join the team. To sign up you must:</p><br>
                <ol class='lighttext'>
                    <li>Complete and submit the <?php echo "
                    <a href='$bcurl' style='color: #aad400; text-decoration: underline'>
                    enrollment form</a>"; ?>,</li>
                    <li>Pay the $50 registration fee (use PayPal link provided).</li>
                </ol><br>
                <p class='lighttext'>Boot camp will take place twice a week 
                    (usually on Monday and Wednesday evenings) for 2 weeks in a row starting <?php echo "$finish"; ?>. Skater age range is 8 to 18. Application and fees may be accepted at the door. If you miss Boot Camp and still wish to join during open enrollment, please contact us to schedule a skating evaluation with a coach for training placement. <br><br>
                    Don't miss out on this once-a-year opportunity! Enroll today!</p>
            </div>

            <div class="columnright">
                <img class="boximage" src="../images/logo.webp" style="margin-bottom: 20px">
                
                <p class="lighttext" id="bcinfo">Enrollment closes in<br>
                    <span style="font-size: 56px; line-height: 56px">    
                        <script>daysRemaining();</script> days
                    </span>
                <span style="font-size: 16px"><br>Don't miss out! Sign up now!</span></p><br>
                
                <!-- Paypal payment form -->
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" id='regfee'>
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="TP3E9S69NG6ML">

                    <input type="hidden" name="on0" value="Enter Skater's Name"><p class="lighttext" style="color: #aad400; text-align: center">Pay Registration Fee

                    <input type="text" name="os0" maxlength="200" style="width: 165px; margin: 0 20px"
                           placeholder="Skater's Name">

                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" style="margin: 10px 35px">
                    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>
            </div>
        </div>
        
        <!-------------------------------------------------------------------->
        
        <h2>Player and Parental Commitments</h2>    
        <div class="row2">
            <div class="columnleft2">
                <img class="boximage" src="../images/logo.webp">
                <div class="start"></div>
                <img class="boximage" src="../images/logo.webp">
                <div class="start"></div>
                <img class="boximage" src="../images/logo.webp">
                <div class="start"></div>
                <img class="boximage" src="../images/logo.webp">
            </div>

            <div class="columnright2">
                <h3>Monthly Dues</h3>
                <p class="darktext">
                    If your family has more than one skater playing, discounts 
                    are available as follows: </p><br>
                <ul class="darktext">
                    <li>1st skater - $35</li>
                    <li>2nd skater - $20</li>
                    <li>3rd skater - $15</li>
                </ul><br>
                <p class="darktext">
                    Monthly dues may be paid in person or through our 
                    <a href="../pages/store.php" style='text-decoration: underline'>online store page</a>. We 
                    recommend setting up automatic payments through Paypal.com 
                    to assure timely payments.
                </p>
                
                <div class="line"></div>
                
                <h3>Required Purchases</h3>
                <p class="darktext">
                    A set of basic derby equipment will cost approximately $250 
                    and up. Check the links below for suggested beginner 
                    equipment. Each skater is required to have all of the below 
                    equipment at every practice and game.
                </p><br>
                    
                <ul class="darktext" style="text-align: left">
                    <li>Supplemental insurance (approximately $25 annually)</li>
                    <li>Rocket City Rebels Team Jersey ($70 + tax)</li>
                    <li>Derby Skates</li>
                    <li>Helmet</li>
                    <li>Elbow Pads</li>
                    <li>Knee Pads</li>
                    <li>Wrist Guards</li>
                    <li>Moldable Mouth Guard</li>
                </ul>
                
                <div class="line"></div>
                

                <h3>Attendence</h3>
                <p class="darktext">
                    Players must attend 70% of practices to be considered an 
                    active member of the team and be eligible for game play.
                </p>             
                    
                <div class="line"></div>
                    
                <h3>Exercise</h3>
                <p class="darktext">
                    Players are encouraged to engage in strength building and 
                    cardio exercise weekly outside of practice. At times, 
                    players may be required to record and report their daily
                    at-home exercise activities.
                </p>
                    
                <div class="line"></div>
                    
                <h3>Volunteering</h3>
                <p class="darktext">
                    A member from each skater's family must voluteer their time 
                    to assist with 3 of the monthly bouts (games against other 
                    teams - 2.5 hours per bout). A family member of each skater 
                    must also volunteer at a minimum of 2 Saturday events (approx. 
                    4 hours each) per year. If you are unable or unwilling to 
                    meet your volunteer commitments you can opt to pay a once per 
                    year donation of $150 to cover your volunteer hours.
                </p><br>
            </div>
        </div>
        
        <!-------------------------------------------------------------------->     
        
        <script>
        // Adjustments to CSS when boot camp is in season
            document.getElementById("pagetitle").innerHTML = "Become a Rebel";
            if(inSeason()) {
                window.onload = scrolldown;
                document.getElementById("start").style.margin = "265px";
                document.getElementById("bcinfo").style.display = "block";
                document.getElementById("regfee").style.display = "block";
                document.getElementById("offseason").style.display = "none";
                document.getElementById("onseason").style.display = "block";
            }
            else
                document.getElementById("start").style.margin = "58px";
        </script>
        
    </main>
    
    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>