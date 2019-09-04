<footer>

    <p>&copy; 2019 Rocket City Rebels Jr. Roller Derby<br>Huntsville, Alabama
        <br><br>
        <a href="https://www.facebook.com/RocketCityRebels/">
            <img src="../images/FBLogo.png" width='30'></a>
        <br>Sponsored by:<br></p>
    
    <?php
        $displaySponsors = $db->prepare("SELECT logo FROM sponsors");
        $displaySponsors->execute();
        
        while($row = $displaySponsors->fetch(PDO::FETCH_ASSOC)) {
            $logo = $row['logo'];

            echo "<img class='sponsors' alt='logo file not found'
            src='../images/sponsors/$logo'>";
        }    
    ?> 

</footer>