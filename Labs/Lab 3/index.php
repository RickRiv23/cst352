<?php

$deck = range(1, 52);
$suit = array("clubs", "spades", "hearts", "diamonds");
$totalPoints = 0;

shuffle($deck);


function hand(){
    // $points = 0;
    global $deck, $suit, $totalPoints;
    $aceCount = 0;
    $handVal = 0;
    
    for($i=0; $i<5; $i++){
        $card = array_pop($deck);
        $cardVal = $card % 13;
        
        if($cardVal == 0){
            $cardVal = 13;
        }
        
        $indexVal = ($card - 1)/13;
        
        if($cardVal == 1){
            $aceName = "ace";
            echo "<img src='cards/".$suit[$indexVal]."/$cardVal.png' alt='$cardVal' title='$cardVal' class='$aceName'/>";
            ++$aceCount;
        }else{
            echo "<img src='cards/".$suit[$indexVal]."/$cardVal.png' alt='$cardVal' title='$cardVal' />";
        }
        
        $handVal += $cardVal;
    }
    
    echo "<h3>Points: $handVal</h3>";
    $totalPoints += $handVal;
    return $aceCount;
}

function winner($p1, $p2){
    global $totalPoints;
    if($p1 > $p2){
        echo "<br/><br/>You win $totalPoints Points!";
    }elseif($p1 < $p2){
        echo "<br/><br/>PC wins $totalPoints Points!";
    }else{
        echo '<br/><br/>Tie!';
    }
}
?>
    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" >
        <title>Lab 3: Ace Poker</title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
        <style type="text/css">
            .winner{
                font-style: strong;
                font-size: 60px;
                <?php
                    $red = rand(0,255);
                    $green = rand(0,200);
                    $blue = rand(0,250);
                     echo "color: rgb($red, $green, $blue, 1);";
                ?>
        </style>
    </head>
    <body>
        <div class="mainTitle">
            <h1>Ace Poker</h1>
            <h2>The player with more points wins!</h2>
        </div>
        
        <div class="game"><?php
        
        echo '<h3>You: </h3>';
        $p1 = hand();
        echo '<br/><br/>';
        
        echo '<h3>PC: </h3>';
        $p2= hand();
        echo '<br/><br/>';
        
        ?></div>
        
        <h3 class="winner">
            <?=winner($p1, $p2)?>
        </h3>
    </body>
    <footer>
        <hr>
        CST352. 2018&copy;RickRivera<br />
        <strong>DISCLAIMER</strong>: this website is a <strong>meme</strong>.<br />
        It is intended for academic use only.<br />
        <figure id="csumb">
            <img src="/../../csumb_logo.jpg" alt="CSUMB Logo" />
        </figure>
    </footer>
</html>