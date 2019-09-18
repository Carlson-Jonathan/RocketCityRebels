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
                <p class="emphasistext">Honorable Mentions:</p><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
                </p><br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim.</p>
            </div>

            <div class="columnright">
                <p>Lorem ipsum dolor sit amet, </p>
            </div>

        </div>
        <h2>Blog:</h2>  
        <div class="row">
            <div class="columnleft">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p><br>
            </div>

            <div class="columnright">
                <p>Lore#5cf236m ipsum dolor </p>
            </div>
        </div>

    </main>

    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>