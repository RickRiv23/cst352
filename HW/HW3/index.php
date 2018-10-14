<?php
    $x = $_GET['x'];
    $y = $_GET['y'];
    
    if( isset($_GET['x']) && isset($_GET['y']) ){
        
        $operator = "";
        if( isset($_GET['operator']) ){     //      CHECK operator value... display values per operator
            $operator = $_GET['operator'];
            operate($x,$y,$operator);
        }else{
            echo "<p>Please select an operation to be done</p><br>";
        }
    }else{
        echo "<p>Please enter values for x and y</p><br>";
    }
    
    
    
    //  FUNCTION operate() returns total for operation done... takes arguments for x,y,and chosen operator
    function operate($x,$y,$operator){
        global $x;
        global $y;
        global $operator;
        
        switch($operator){
            case multiply:
                $total=($x*$y);
                return $total;
            case divide:
                $total=($x/$y);
                return $total;
            case add:
                $total=($x+$y);
                return $total;
            case subtract:
                $total=($x-$y);
                return $total;
        }
    }
    
    
    //  Check for page refresh
    $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
    
    if($pageWasRefreshed){
        $x=null;
        $y=null;
        $operator=null;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <title>HW3 Calculator</title>
    </head>
    <body>
        <h1>A Basic Calculator</h1>
        <h3>Using the expression 'x' (select your operator) 'y'<br>Example: <span>x + y</span><br>Create your own expression</h3>
        
        
        <form method="get">
            <div class="enterValue">
                <lable for="x">Please enter your <span>first</span> value: <br><input type="text" size="10" name="x" placeholder="X" value="<?=$_GET["x"]?>" required></lable>
            </div>
            
            <div class="radioBox"><label for="">Please select an <span>opertation</span>: <br>
                
                <input type="radio" name="operator" value="multiply" id="multiply"><label for="multiply">Multiply</label><br>
                <input type="radio" name="operator" value="divide"  id="divide"><label for="divide">Divide</label><br>
                <input type="radio" name="operator" value="add"  id="add"><label for="add">Add</label><br>
                <input type="radio" name="operator" value="subtract"  id="subtract"><label for="subtract">Subtract</label><br>
                
            </label></div>
            
            
            <div class="enterValue">
                <lable for="y">Please enter your <span>second</span> value: <br><input type="text" size="10" name="y" placeholder="Y" value="<?=$_GET["y"]?>" required></lable>
            </div>
            
            <div class="buttonContainer">
                <button id="button" type="submit" name="submitBtn" value="Submit">Calculate</button>
            </div>
        </form>
        
        <div>
            <br><h3>Result:</h3><br>
            <div class="diamondContainer">
                <div id="result"><b><?=operate($x,$y,$operator)?></b></div>
            </div>
        </div>
    </body>
</html>