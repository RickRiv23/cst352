<?php

session_start();

if (!isset($_SESSION['adminSesh'])) { //Valiadates whether admin logged in.
    
    header("Location: login.php");
    
}

include '../sqlConnection.php';
$dbConn = getConnection("heroes");

$sql = "DELETE FROM Superheroes
        WHERE hero_id = " . $_GET['hero_id'];

$stmt = $dbConn->prepare($sql);
$stmt->execute();

header("Location: admin.php");

?>