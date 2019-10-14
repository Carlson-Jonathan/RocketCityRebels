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
                This site gives you control over the Rocket City Rebels website and
                allows you to update information without having to know anything 
                about web coding. Many aspects of this website are even automated 
                and update automatically with timers. <br><br>

                This page contains a list of instructions for using the 
                administrative section. While most of the user interface is easy 
                to figure out, you should read the instructions carefully to 
                avoid unintended effects. As you may have already figured out, 
                this backstage site is not accessible through conventional links, 
                but can be accessed by making a subtle change in the URL address, 
                namely by entering ‘admin.php’ at the end replacing the name of the 
                page you are viewing. Feel free to bookmark this page for easier
                future access.<br><br>

                The navigation menu of this site will take you to other administrative 
                sections where you can make changes to the corresponding pages. If 
                you wish to return to the main site’s home page, simply by click 
                “RETURN” on the navigation bar. Changes made in the administrative 
                section take effect immediately. <br><br>
                
                Thank you for the opportunity to create a new website for the Rocket 
                City Rebels Jr. Roller Derby Team and I hope you enjoy the presentation! 
            </p>
        </div>
        
        <h2>How to change images on different pages</h2>
        <div class="row">
            <h3 style="color: #aad400">Set up Filezilla</h3>
            <p class="lighttext" style="font-size: 18px">
                Filezilla is an FTP application that allows you to manage files on
                BlueHost, the server that hosts rocketcityrebels.com. Any time you
                need to upload, deleted, move, or modify files, Filezilla can help
                you do this. For example, if new players join the team, you can 
                upload their portrait via Filezilla and use the administrative  
                'skaters' page to display it with their profile. Additionally, by 
                accessing the correct folder, you can swap out old pictures for 
                newer ones, such as the team photo, as time passes.</p>
                
            <ol class="lighttext" style="margin: 40px;">
                <li>Download and install <a href="https://filezilla-project.org" style="color: #aad400">
                    Filezilla</a>. Start the program.</li>
                <li>Click "File", and select "site manager" (or simply press CTRL + 'S') 
                    to create a connection.</li>
                <li>Configure Filezilla to connect using the below settings 
                    (get password from president):</li>
                <img src="../images/PagePhotos/AdminSite/Filezilla.jpg" 
                     style="text-align: center" width="100%"><br><br>
                <li>Navigate to the folder containing the images. They will all 
                    be under "public_html/images". <br>
                CAUTION: Do not touch any of the other folders. You will likely 
                    break the website if you do!</li>
                <img src="../images/PagePhotos/AdminSite/Filezilla2.jpg" 
                     style="text-align: center" width="100%">
                <li>The folders in the left column show the files on your hard drive. 
                    The folders in the right
                column are the folders on the web server. You can make changes and 
                    move files around the same
                way you would in a Windows explorer window.</li>
                <li>If you want to replace existing images, simply name the new image
                identical to the image you are replacing, and copy over it (drag and drop). If you are
                adding new skaters, just drop their portrait file in the correct folder
                and use the controls on the administrative site to set up their profile.</li>
            </ol>
                
            <h3 style="color: #aad400">IMPORTANT:</h3>
                <p class="lighttext">When uploading new pictures, it is important to make the file
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
                ShortPixel.com</a> to further reduce the size. This should not reduce 
                    image quality. Once the file size is minimized, you can upload it 
                    to the correct folder. Skater portraits are only around 6kb each.
            </p>
        </div>
        
        <h2>How to add/remove people on the skaters page</h2>
        <div class="row2">
            <h3 style="color: #251010">Add a New Person</h3>
            <p class="darktext" style="font-size: 18px; margin-left: 30px">    
                1.) Upload their image file to the "portraits" folder using Filezilla (see above instructions).<br>
                2.) On the 'skaters' page (Administrative site), fill in the empty green boxes at the bottom of the list.<br>
                3.) Click the green "+" button on the left. The page should 
                refresh and show the new person.<br>
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
            paste the information to the admin skaters page.  Do not rely on this site to be the only place the skater information is stored.<br><br>
            <span style="color: red">*IMPORTANT*</span><br> Any time you need to use an apostrophe, enter it twice. For example,
            "coach's" would be entered as "coach''s". This is a security work-around
            to prevent web hacking attempts. Not doing this will ignore and erase
            anything you enter after clicking "save".</p>
        </div>        
        
    </main>

    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>