<?php session_start(); ?>
<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <title>Contact | Blog | Social Media: The Rebels Are Out There</title> 

    <meta name="description" content="Contact our board of directors, visit us on Facebook, and stay up to date with the latest Rocket City Rebel activities."> 
</head>
<body>

    <?php include "title-nav.php"; ?>

    <main>
        <h2>Contact Us:</h2>  
        <div class="row2">
            <div class="columnleft2" id='contact1'>
                <img src='../images/logo.webp' style='width: 80%'>
            <p class="darktext">If you have any questions, comments, or
                concerns, please contact us using the form and a member of 
                the Rocket City Rebels board of directors will get back with
                you. You may also contact us through our Facebook page
                (information below).</p><br>
            </div>

            <div class="columnright2" id='contact2'>
                <form action="../scripts/contactForm.php" method="POST"
                      class='darktext'>
                    Name:
                    <input type="text" width="500px" placeholder="John Doe"
                           name='name' required><br><br>
                    Email:
                    <input type="email" width="500px" placeholder="JohnDoe@Email.com" name='email' required><br><br>
                    Phone:
                    <input type='phone' width='500px' name='phone'
                           placeholder='555-555-5555' required><br><br>
                    Message:<br>
                    <textarea rows="10" cols="35" placeholder="Your message here." name='message' required></textarea><br>
                    <div style='margin-left: 85px'>
                        <input type="submit" name="submit" value="Send Message"
                           class="save">    
                    </div>
                </form>
            </div>
        </div>

        <h2>Rebels on Social Media:</h2>  
        <div class="row">

            <div class="columnleft">
                <p class='lighttext'>Join us on Facebook to chat, get information about news, events, special offers, minute-to-minute updates during games, or just to socialize.</p><br>
                <image src='../images/logo.webp' style="width: 200px"></image>
            </div>

            <div class="columnright" style='text-align: center'>
                <a href="https://www.facebook.com/RocketCityRebels/" style='text-decoration: none'>
                <p class='lighttext' style='text-align: center; font-size: 20px; color: #aad400'>Visit Our</p>
                <image src='../images/FBLogo.png'></image>
                <p class='lighttext' style='text-align: center; font-size: 18px; color: #aad400'>Facebook<br>Page</p></a>
            </div>

        </div>
    </main>

    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>