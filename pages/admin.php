<?php session_start(); ?>
<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <link id="styles" rel="stylesheet" href="../styles/admin.css">
</head>   
    
<body>

    <?php $_SESSION['access'] = false; ?>

    <main>
        <div style="margin-top: 50px;"></div>
        
        <!-------------------------------------------------------------------->
        
        <h2>Authorization Required</h2>
        <div class="row">
            <p class="lighttext" style="font-size: 18px;">
                You are attempting to access the administrative section of the
                RocketCityRebels.com website. To gain access, you must enter a
                password that will be encrypted by an unbreakable SHA-5 
                encryption algorithm. Attempt to hack into this section of
                the website will be met with a proactive counter attack on
                your system, followed by an extreme electrical shock through
                your keyboard, and a possible patriot missile deployment to
                your GPS location. No, a VPN will not protect you, so don't
                try it!<br><br>
                
                However, if you are a member of the Rocket City Rebels board of
                directors, WELCOME! We hope you enjoy your visit and have a nice
                day! :)
            </p><br>
            <div style="text-align: center">
                <p class="lighttext" style="text-align: center">Enter Password:</p>
                <form method="POST" action="../scripts/admin/adminaccess.php">
                    <input type="password" name='password' id="password"><br><br>
                <p class="lighttext" style="text-align: center" id="incorrect"></p>
                    <?php if($_SESSION['pw']) echo "
                    <p style='color: red'>Invalid Password!</p><br>" ?>
                    <input type="submit" value="ENTER" class="save">
                </form>
            </div>
            
        </div>        
        
    </main>

</body>
    
</html>