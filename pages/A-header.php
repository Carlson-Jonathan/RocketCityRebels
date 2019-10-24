<!-----------------------------------------------------------------------------
- A-header.php
- Author:
-   Jonathan Carlson
- Description:
-   Contains the title and navigation menu of each admin page. All
-   administrative pages are prefixed by "A-...".
------------------------------------------------------------------------------>
<?php session_start(); ?>

<!-- Redirects the user to a non-existing page if they attempt to input an 
     admin address directly in the URL address bar. -->
<?php 
    if($_SESSION['access'] == false) {
        header("Location: ../index.php"); 
        echo '<script>window.location.href = "../index.php";</script>';
    }
?>

<header>
    <h1 id="pagetitle">Administrative Access</h1>

    <nav>
        <ul id="navigation">
            <div class="topnav" id="myTopnav">
            <a href="../pages/A-instructions.php">   
                <li id="A-instructions.php" class="navbuttons">INSTRUCTIONS</li>   
            </a>
            
            <a href="../pages/A-skaters.php">    
                <li id="A-skaters.php" class="navbuttons">SKATERS</li>      
            </a>
            
            <a href="../pages/A-schedule.php">   
                <li id="A-schedule.php" class="navbuttons">SCHEDULE</li>    
            </a>
            
            <a href="../pages/A-store.php">       
                <li id="A-store.php" class="navbuttons">STORE</li>            
            </a>
                        
            <a href="../pages/A-misc.php">    
                <li id="A-misc.php" class="navbuttons">MISC</li>      
            </a> 
            
            <a href="../index.php">      
                <li id="index.php" class="navbuttons">RETURN</li>           
            </a>
            
            <a href="javascript:void(0);" style="font-size:34px; margin-right: 15px" class="icon" onclick="expandMenu()">&#9776;</a>
            </div>
        </ul>    
    </nav>
    
    <script src="../scripts/hamburger.js"></script>
    <script src="../scripts/activeNav.js">
        // Highlights active page on navigation bar
    </script>
</header>

<div id="start"></div>
<script>startHeight();</script>