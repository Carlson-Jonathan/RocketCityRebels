<?php session_start(); ?>
<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <link id="styles" rel="stylesheet" href="../styles/admin.css">
</head>   
    
<body>

    <?php 
        include "A-header.php"; 
    ?>

    <main>
        <div class="start"></div>
        
        <!-------------------------------------------------------------------->
        
        <h2>Welcome Administrator!</h2>
        <div class="row2">
            <p class="darktext" style="font-size: 18px;">
                Welcome to the administrative access site for RocketCityRebels.com! 
                This site was designed to provide control over the Rocket City 
                Rebels website to members on the board of directors. The 
                interactive design will allow information on the site to stay 
                up to date using convenient and intuitive user interface. This 
                behind-the-scene mirror site to the Rebels website gives you 
                administrative control over much of the website’s content 
                without having to know coding or web development. Many aspects 
                of this website are even automated and update automatically with 
                time. <br><br>

                This page contains a list of instructions for using the 
                administrative section. While most of the user interface is easy 
                to figure out, you should read the instructions carefully to 
                avoid unintended effects. As you may have already figured out, 
                this backstage site is not accessible through conventional links, 
                but can be accessed by making a subtle change in the URL address, 
                namely by entering ‘admin.php’ at the end replacing the name of the 
                page you are viewing. <br><br>

                The navigation menu of this site will take you to other administrative 
                sections where you can make changes to the corresponding pages. If 
                you wish to return to the main site’s home page, this can be done 
                simply by clicking the “RETURN” link on the navigation bar. Any 
                changes you made while in the administrative site will take effect 
                immediately. Thank you for the opportunity to create a new website 
                for the Rocket City Rebels Jr. Roller Derby Team and I hope you enjoy 
                the presentation! 
            </p>
        </div>
        
        <h2>How to change images on different pages</h2>
        <div class="row">
            <p class="lighttext" style="font-size: 18px">    
                The photos and images for each page are sorted into folders named 
                after the page. You may change the pictures that appear on each 
                page as you wish, but the file name must remain the same. For 
                example, if you want to update the team picture on the skaters 
                page to a more recent group photo, access the "skaters" folder 
                in the "PagePhotos" folder, delete the file named 
                "TeamPicture.jpg", and replace it with another image file with 
                the same name.<br><br>
                When uploading new pictures, it is important to make the file
                size as small as possible to avoid long page load times. To do 
                this, use an image editing program such as Photoshop or 
                <a href="https://www.getpaint.net/download.html" style=
                   "color: #aad400">Paint.net</a>
                to set the resolution of the file you wish to upload equal to 
                the resolution of the file being replaced. Then, run the file
                through a web image compresser program such as 
                <a href="https://tinypng.com/" style="color: #aad400">TinyPng.com</a> or 
                <a href="https://shortpixel.com/online-image-compression" style=
                   "color: #aad400">
                ShortPixel.com</a> to further 
                reduce the size. This should not reduce image quality. Once the
                file size is minimized, you can upload it to the correct folder.
            </p>
        </div>
        
        <h2>How to add/remove people on the skaters page</h2>
        <div class="row2">
            <h3 style="color: #251010">Add a New Person</h3>
            <p class="darktext" style="font-size: 18px; margin-left: 30px">    
                1.) Upload their image file to the "portraits" folder.<br>
                2.) Fill in the empty green boxes at the bottom of the list.<br>
                3.) Click the green "+" button on the left. The page should 
                refresh to show the new person.<br>
                4.) Add/Edit their text narrative with the green "Edit" button
                on the right.
            </p><br>
                
            <h3 style="color: #251010">Remove a Person</h3>
            <p class="darktext" style="font-size: 18px; margin-left: 30px">    
                1.) Click the red "X" button next to the person you want to remove.
                (No undo)<br>
                2.) Marvel at how easy the web designer made this step.
            </p><br><br>
            <p class="darktext" style="font-size: 14px">
                <span style="color: green">*Tip:</span><br> Create and save all of the information
            about the skaters in a spreadsheet or word document, then copy and
            paste the information to the admin skaters page. Do not rely on this site to be
            paste the information to the admin skaters page. Do not rely on this site to be
            the only place the skater information is stored.<br><br>
            <span style="color: red">*IMPORTANT*</span><br> Any time you need to use an apostrphe, enter it twice. For example,
            "coach's" would be entered as "coach''s". This is a security work-around
            to prevent web hacking attempts. Not doing this will ignore and erase
            anything you enter after clicking "save".</p>
        </div>        
        
    </main>

    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>