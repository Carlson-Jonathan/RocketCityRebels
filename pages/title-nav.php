<!-----------------------------------------------------------------------------
- Contains the title and navigation menu of each page.
------------------------------------------------------------------------------>

<header>
    <h1 id="pagetitle">Rocket City Rebels</h1>

    <nav>
        <ul id="navigation">
            <div class="topnav" id="myTopnav">
            <a href="../index.php">      
                <li id="index.php" class="navbuttons">HOME</li>           
            </a>
            
            <a href="../pages/enlist.php">    
                <li id="enlist.php" class="navbuttons">ENLIST</li>      
            </a>  
            
            <a href="../pages/skaters.php">    
                <li id="skaters.php" class="navbuttons">SKATERS</li>      
            </a>
            
            <a href="../pages/schedule.php">   
                <li id="schedule.php" class="navbuttons">SCHEDULE</li>    
            </a>
            
            <a href="../pages/store.php">       
                <li id="store.php" class="navbuttons">STORE</li>            
            </a>
            
            <a href="../pages/sponsors.php">   
                <li id="sponsors.php" class="navbuttons">SPONSORS</li>    
            </a>
            
            <a href="../pages/more.php">       
                <li id="more.php" class="navbuttons">CONTACT</li>            
            </a>
            <a href="javascript:void(0);" style="font-size:34px; margin-right: 15px" class="icon" onclick="expandMenu()">&#9776;</a>
            </div>
        </ul>    
    </nav>
    
    <div id='shift'>
    <?php require ($_SERVER['DOCUMENT_ROOT'].'/scripts/admin/bootcampheader.php');?>
    </div>

	<div id='shoppingCart'>
	</div>
    
    <script src="../scripts/hamburger.js"></script>
    <script src="../scripts/activeNav.js">
        // Highlights active page on navigation bar
    </script>
</header>

<div id="start"></div>
<script>startHeight();</script>