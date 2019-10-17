<?php
    /**************************************************************************************
    * Set up BlueHost database
    **************************************************************************************/
    try {
        $db = new PDO("pgsql:host='localhost';port=5432;dbname='rocketi8_rebels'", 'rocketi8_Rebel_Admin', 'N3wR3b3l!');
    }
    catch (PDOException $ex) {
        print "<p style='color: yellow'>PostgreSQL database failed to load - error: $ex->getMessage() </p>\n\n";
        print "<br><p style='color: yellow'>Current Server and Database Information:<br>";
        print "PostgreSQL:host = $dbHost<br>Port = $dbPort<br>Database Name = $dbName<br>User Name = $user\n</p>";
        die();
    }
    /*************************************************************************************/
?>
