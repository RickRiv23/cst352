<?php

    $signs = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
    $startYear = $_GET['start'];
    $endYear = $_GET['end'];
    
    function years(){
        global $startYear, $endYear;
        global $signs;
        $yearSum;
        $index = 0;
        
        for($i=$startYear; $i<$endYear; $i++){
            if($i%4 ==0){
                    
                
                echo "<li>Year $i ";
                
                if($i %100 == 0){
                    echo "<b>HAPPY NEW CENTURY</b>";
                }
                if($i==1776){
                    echo "<b>USA Independence</b>";
                }
                
                echo "</li>";
                
                
                echo "<img src = '".$signs[$index].".png'/>";
                $index += 1;
                
                if($index == 12){
                    $index = 0;
                }
            }
            
            
            $yearSum += $i;
        }
        
        return $yearSum;
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Zodiac</title>
        <style type="text/css">
            html{
                text-align: center;
                font-family: 'Helvetica';
            }
            ul{
                list-style-type: none;
            }
        </style>
    </head>
    <body>
        <h1>Chinese Zodiac</h1>
        <form method="GET">
            <input type="text" name="start" value="<?=$_GET['start']?>"/>
            <input type="text" name="end" value="<?=$_GET['end']?>"/>
            <input type="submit" value="Submit"/>
        </form>
        <ul>
            <?php
            /*$startYear = 1900;
            $endYear = 2001;*/
            $sum = years();
            
            ?>
        </ul>
        
        <h2>Year Sum: <?=$sum?></h2>
        
    </body>
</html>