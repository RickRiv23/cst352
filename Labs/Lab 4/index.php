<?php


    $background = "img/sea.jpg";
    
    $keyword = $_GET['keyword'];
    
    if (isset($_GET['keyword']) ){
        
        include 'api/pixabayAPI.php';
        
        
        
        $layout = "horizontal";
        if(isset($_GET['layout'])){
            $layout = $_GET['layout'];
        }
        
        if(!empty($_GET['category'])){
            $keyword = $_GET['category'];
        }
        
        
        $imageURLs = getImageURLs($keyword, $layout);
        $randomIndex = array_rand($imageURLs);
        $background = $imageURLs[$randomIndex];
        echo "You searched for: <b>$keyword</b>";
        
        shuffle($imageURLs);
    }elseif(!isset($_GET['keyword']) || $_GET['keyword'] == "" || $_GET['keyword'] == null){
        $background = "img/sea.jpg";
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <style type="text/css">
            body{
                background-image: url('<?=$background?>');
                background-size: 100% auto;
                background-repeat: no-repeat;
                text-align: center;
            }
            
            .keyword{
                font-size: 35px;
            }
            
            #carouselExampleIndicators{
                width: 500px;
                margin: 20px auto;
            }
            
            .radio{
                background: rgba(0,0,0, 0.7);
                width: 15%;
                height: auto;
                margin: 5px auto;
                padding: 2px;
                border-radius: 10px;
            }
            
            .radio__btn{
                width: 100%;
            }
            
            button{
                padding: 5px;
                margin: 10px 30px;
                color: black;
                font-size: 20px;
                border-radius: 50px;
                width: 10%;
                background: white;
            }
            
            .buttonContainer{
                text-align: center;
                margin: 0px auto;
            }
            
            .footer{
                margin: 50px auto;
            }
        </style>
    </head>
    <body>
        <br><br>
        
        
        
        <form method="get">
            <input class="keyword" type="text" size="15" name="keyword" placeholder="Keyword" value="<?=$_GET["keyword"]?>">
            
            <aside class="radio">
                <div class="radio__btn">
                    <input type="radio" name="layout" value="horizontal" id="hlayout" 
                    
                    <?php
                        if($_GET['layout'] == "horizontal"){
                            echo " checked ";
                        }
                    ?>
                    
                    ><label for="hlayout"> Horizontal </label>
                </div>
                <div class="radio__btn">
                    <input type="radio" name="layout" value="vertical" id="vlayout" 
                    
                    <?=(($_GET['layout'] == "vertical")?" checked ":"")?>
                    
                    ><label for="vlayout"> Vertical </label>
                </div>
            </aside>
            
            
            <select name="category">
                <option value="">Select One</option>
                <option>Sky</option>
                <option>Mountain</option>
                <option>Sea</option>
                <option>Forest</option>
            </select>
            <div class="buttonContainer">
                <button id="button" type="submit" name="submitBtn" value="Submit">Submit</button>
            </div>
        </form>
        
        <br><br>
        
        <?php
            if( isset($keyword) && !empty($keyword) ){
        ?>
        
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <?php
                        for($i=1; $i<7; $i++){
                            echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
                        }
                    ?>
                </ol>
                  <div class="carousel-inner">
                      <?php
                      for($i=0;$i<7; $i++){
                          
                          echo "<div class='carousel-item ";
                          echo ($i == 0)?" active ":"";
                          echo "'>";
                          echo "<img class=\"d-block w-100\" src=\"".$imageURLs[$i]."\" alt=\"Other slide\">";
                          echo "</div>";
                      }
                      ?>
                   
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                  </a>
            </div>
        
        <?php
        }else{
        ?>
        
            <div class="footer">
                <h3>Type a keyword or select a category</h3>
            </div>
        
        <?php
            $background = "img/sea.jpg";
        
        }       //  Close if
        ?>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        </body>
</html>