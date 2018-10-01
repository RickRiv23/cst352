<?php
$diceNum = range(1, 6);
$totalPoints = 0;

shuffle($diceNum);


function roll(){
    global $diceNum, $totalPoints;
    $rollVal = 0;
    
    for($i=0; $i<5; $i++){
        $dice = $diceNum[rand(0,5)];
        
        
        echo "<img src='img/$dice.png' alt='$dice' title='$dice' />";
        
        $rollVal += $dice;
    }
    
    echo "<h3>Points: $rollVal</h3>";
    $totalPoints += $rollVal;
    return $rollVal;
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
                <?php
                    $red = rand(100,255);
                    $green = rand(100,200);
                    $blue = rand(100,250);
                     echo "color: rgb($red, $green, $blue, 1);";
                ?>
        </style>
    </head>
    <body>
        <div class="mainTitle">
            <h1>Ace Poker</h1>
            <h2>The player with more points wins!</h2>
        </div>
        
        <div class="userGame">
        <h3>You: </h3>
        <?php
        $p1 = roll();
        ?>
        <br/><br/>
        </div>
        
        <div class="pcGame">
        <h3>PC: </h3>
        <?php
        $p2= roll();
        ?>
        <br/><br/>
        </div>
        
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