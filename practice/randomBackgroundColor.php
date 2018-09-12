<?php
    function randColor(){
        $rand = rand(0,255);
        echo "color: rgb($rand, ".rand(0,255).", 211, ".(rand(0,10)/10).");";
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Random Colors</title>
        <meta charset="utf-8"/>
        
        <style>
            body{
                
                <?php
                    $red = rand(0,255);
                    $green = rand(0,200);
                    $blue = rand(0,250);
                     echo "background-color: rgb($red, $green, $blue, .6);";
                ?>
                padding-top: 150px;
            }
            h1{
                
                text-align: center;
                font-size: 250px;
                color: rgb(110, 170, 220) !important;
                
                <?php
                    $rand = rand(0,255);
                    echo "color: rgb($rand, 164, 211);";
                ?>
            }
            footer{
                font-size: 25px !important;
                text-align: center;
                color: rgba(255, 255, 255, .3);
                padding-top: 800px;
            }
        </style>
    </head>
    <body>
        <h1><strong>Colors</strong></h1>
        
    </body>
    <footer>2018&copy;RickRivera<br/>Makin memes</footer>
</html>