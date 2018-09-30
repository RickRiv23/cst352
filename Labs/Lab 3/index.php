<?php

$deck = range(1, 52);
$suit = array("clubs", "spades", "hearts", "diamonds");
shuffle($deck);


function hand(){
    // $points = 0;
    global $deck, $suit;
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
    
    echo "Points: $handVal";
    
    return $aceCount;
}
?>
    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" >
        <title>Lab 3: Ace Poker</title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
    <body>
        <div class="mainTitle">
            <h1>Ace Poker</h1>
            <h2>The player with more points wins!</h2>
        </div>
        
        <div class="game"><?php
        
        echo 'You: ';
        $p1 = hand();
        // echo $p1;
        echo '<br/><br/>';
        
        echo 'You: ';
        $p2= hand();
        // echo $p2;
        echo '<br/><br/>';
        
        if($p1 > $p2){
            echo '<br/><br/>You win!';
        }elseif($p1 < $p2){
            echo '<br/><br/>PC wins!';
        }else{
            echo '<br/><br/>Tie!';
        }
        
        ?></div>
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