<?php

$diceNum = range(1, 6);
$totalPoints = 0;

shuffle($diceNum);


function roll(){
    global $diceNum, $totalPoints;
    $rollVal = 0;
    
    for($i=0; $i<5; $i++){
        $dice = array_pop($diceNum);
        $cardVal = $dice;
        
        // if($cardVal == 0){
        //     $cardVal = 13;
        // }
        
        // $indexVal = ($card - 1)/13;
        
        // if($cardVal == 1){
        //     $aceName = "ace";
        //     echo "<img src='cards/".$suit[$indexVal]."/$cardVal.png' alt='$cardVal' title='$cardVal' class='$aceName'/>";
        //     ++$aceCount;
        // }else{
        //     echo "<img src='img/$diceNum.png' alt='$diceNum' title='$diceNum' />";
        // }
        
        echo "<img src='img/$diceNum.png' alt='$diceNum' title='$diceNum' />";
        
        $rollVal += $diceNum;
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