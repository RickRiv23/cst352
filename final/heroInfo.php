<?php

session_start();

if (!isset($_SESSION['adminSesh'])) {
    
    header("Location: login.php");
    
}

include '../sqlConnection.php';
$dbConn = getConnection("heroes");

function getHeroInfo() {
    global $dbConn;
    
    $sql = "SELECT * FROM `Superheroes` 
            WHERE hero_id = "  . $_GET['hero_id'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $record;
    
}

if (isset($_GET['hero_id'])) {
    
    $heroInfo = getHeroInfo();
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hero Information</title>
    </head>
    <body>
        <h2>
            <?=$heroInfo['fullName']?>
        </h2>
        <?=$heroInfo['bio']?><br>
        <img src="<?=$heroInfo['img']?>" height="100">
    </body>
</html>