<?php
    /**************************************************************************************
    * Set up local and Heroku databases
    **************************************************************************************/
    $user = 'postgres';
    $password = 'password';
        
    $dbUrl = getenv('DATABASE_URL');
    if (empty($dbUrl)) {$dbUrl = "postgres://postgres:password@localhost:5432/rebels";}

    $dbopts = parse_url($dbUrl);
    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');

    // Displays which server you are viewing from
    print "<br><h4>Current Server and Database Information:<br>";
    print "PostgreSQL:host = $dbHost<br>Port = $dbPort<br>Database Name = $dbName\n<h4>";
    
    try {
        print "<h4>Attempting to connect...</h4>";
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    }
    catch (PDOException $ex) {
        print "<p>Something broke - error: $ex->getMessage() </p>\n\n";
        die();
    }
    /*************************************************************************************/
?>
