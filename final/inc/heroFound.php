<?php
    
    function displayAllHeroes() {
        
        global $heroes;
        
        if(isset($heroes)) {
                    
            echo "<hr>";
            echo "<h3>Heroes Found </h3>"; 
            echo "<br />";
            //echo "<table class='table' >";
            
            foreach ($heroes as $heroes) {
                $heroesId = $heroes['hero_id'];
                $HeroName = $heroes['name'];
                $powers = $heroes['powers'];
                $universe = $heroes['universe'];
                $heroImg = $heroes['img'];
               
                
                //echo "<tr>";
               
                echo "<h4><a href='#'class='heroLink' id=$heroesId>$heroesName</a></h4>";
                
                
              
            }
            
            
        }
        
    }
  
    
    
?>


