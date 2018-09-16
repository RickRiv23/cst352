<?php
    function displaySymbol($randValue, $i){     //  Displays random symbol based on $randValue
        /*if ($randValue==0){
            echo '<img src="img/seven.png" alt="Seven" width="70" />';
        } else if ($randValue==1){
            echo '<img src="img/cherry.png" alt="Cherry" width="70" />';
        } else {
            echo '<img src="img/lemon.png" alt="Lemon" width="70" />';
        }*/
        
        switch($randValue){
            case 0: $symbol = "seven";
                break;
            case 1: $symbol = "cherry";
                    break;
            case 2: $symbol = "lemon";
                break;
        }
        
        echo "<img id='reel$i' src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."' width='70' />";
    }
            
    function displayPoints($randValue1, $randValue2, $randValue3){
        echo '<div id="output">';
        
        if($randValue1==$randValue2 && $randValue2==$randValue3){
            switch($randValue1){
                case 0: $totalPoints = 1000; 
                    echo '<h1> JACKPOT! </h1>';
                    break;
                case 1: $totalPoints = 500;
                    break;
                case 2: $totalPoints = 250;
                    break;
            }
            echo "<h2>You won $totalPoints points!</h2>";
        } else{
            echo "<h2>Try Again!</h2>";
        }
        echo '</div>';
    }
    
    function play(){
        for($i=0; $i<4; $i++){
            ${"randValue" . $i} = rand(0,2);
            displaySymbol(${"randValue" . $i}, $i);
        }
        displayPoints($randValue1, $randValue2, $randValue3);
    }
?>