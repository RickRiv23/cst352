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