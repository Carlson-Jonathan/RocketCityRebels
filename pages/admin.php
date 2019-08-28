<!DOCTYPE HTML>  
<html lang="en-US">

<?php include "head.php"; ?>
<head>
    <link id="styles" rel="stylesheet" href="../styles/admin.css">
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
        <h2>How to changes images on different pages</h2>
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
                <a href="https://www.getpaint.net/download.html">Paint.net</a>
                to set the resolution of the file you wish to upload equal to 
                the resolution of the file being replaced. Then, run the file
                through an image compression program such as 
                <a href="https://tinypng.com/">TinyPng.com</a> to further 
                reduce the size. This should not reduce image quality. Once the
                file size is minimized, you can upload it to the correct folder.
            </p>
        </div>
        
        <h2>How to add/remove people on the skaters page</h2>
        <div class="row">
            <h3 style="color: #aad400">Add a New Person</h3>
            <p class="lighttext" style="font-size: 18px; margin-left: 30px">    
                1.) Upload their image file to the "portraits" folder.<br>
                2.) Fill in the empty green boxes and the end of the list below.<br>
                3.) Click the green "+" button on the left. The page should 
                refresh to show the new person.<br>
                4.) Add/Edit their text narrative with the green "Edit" button
                on the right.
            </p><br>
                
            <h3 style="color: #aad400">Remove a Person</h3>
            <p class="lighttext" style="font-size: 18px; margin-left: 30px">    
                1.) Click the red "X" button next to the person you want to remove.
                (No undo)<br>
                2.) Marvel at how easy the web designer made this step.
            </p><br><br>
            <p class="lighttext" style="font-size: 14px">Tip: Create and save all of the information
            about the skaters in a spreadsheet or word document, then copy and
            paste the information to this page. Do not rely on this page to be
            the only place the skater information is stored.</p>
            
        </div>
            
        <h2>Skaters</h2>  
        <div class="row2">
            <?php include "../scripts/admin/getskatersDB.php"; ?>
        </div>
        
        <!-------------------------------------------------------------------->
        
        <h2>Coaches</h2>    
        <div class="row2">
            <?php include "../scripts/admin/getcoachDB.php"; ?>
        </div>
        
        <!-------------------------------------------------------------------->
        
        <h2>Referees</h2>    
        <div class="row2">
            <?php include "../scripts/admin/getrefsDB.php"; ?>
        </div>        
        
        <!-------------------------------------------------------------------->        
        <h2>Board of Directors</h2>    
        <div class="row2">
            <?php include "../scripts/admin/getboardDB.php"; ?>
        </div>
        
        <!-------------------------------------------------------------------->        
        
    </main>
    <script>
        document.getElementById("pagetitle").innerHTML = "Administrative Access";
    </script>
    
    <?php include "../pages/footer.php"; ?>
    
</body>
    
</html>