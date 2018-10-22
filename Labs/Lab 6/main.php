<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section </title>
    </head>
    <body>

        <h1>  Admin Section</h1>
        Welcome <?= $_SESSION['adminName'] ?>
    </body>
</html>