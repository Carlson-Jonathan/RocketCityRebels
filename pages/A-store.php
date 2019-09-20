<!DOCTYPE HTML>
<html lang="en-US">

<?php include "head.php"; ?>

<head>
    <link id="styles" rel="stylesheet" href="../styles/admin.css">
    <link id="styles" rel="stylesheet" href="../styles/skaters.css">    
</head>

<body>

    <?php
    include "A-header.php";
    require "../scripts/dbsetup.php";
    ?>

    <main>
        <div class="start"></div>
        <h2>Store Items</h2>
        <div class="row2">
            <?php include "../scripts/admin/getstoreDB.php"; ?>
        </div>


    </main>

    <?php include "../pages/footer.php"; ?>

</body>

</html>