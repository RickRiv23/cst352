<?php

  //print_r($_POST);
  
  $randomBackground = "img/sea.jpg";
  
   if ( isset($_GET['keyword'])  ) {  //checks whether the form has been submitted
  
      include 'api/pixabayAPI.php';
      
      $keyword = $_GET['keyword'];
      
      $layout = "horizontal";
      if (isset($_GET['layout'])) { //checks whether user has checked a layout (horizontal or vertical)
         $layout = $_GET['layout'];
      }
      
      if (!empty($_GET['category'])) { //checks whether user selected a category
        
        $keyword = $_GET['category'];
        
      }
      
      
      $imageURLs = getImageURLs($keyword, $layout);
      
      $randomIndex = array_rand($imageURLs);
      
      $randomBackground = $imageURLs[$randomIndex];
      
      //print_r($imageURLs);

      echo "You searched for:  <strong> $keyword </strong>";
      
      shuffle($imageURLs);
  
   }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Image Slider </title>
        <style>
            
            body {
                
                background-image: url(<?=$randomBackground?>);
                background-size: cover;
                
            }
            
            #carouselExampleIndicators{
                
                width: 500px;
                margin:0 auto;
                
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>

        <br>

        <form method="get">
            
            <input type="text" name="keyword" size="15" placeholder="Keyword" value="<?=$_GET["keyword"]?>"/>
            <input type="radio" name="layout" value="horizontal" id="hlayout" 
            
            <?php
            
              if ($_GET['layout'] == "horizontal") {
                echo " checked ";
              }
            
            ?>
            
            
            >
              <label for="hlayout"> Horizontal </label>
              
            <input type="radio" name="layout" value="vertical" id="vlayout"
            <?=(($_GET['layout'] == "vertical")?"checked":"" )?> >
              <label for="vlayout">Vertical</label>
              
              
            <select name="category">
                <option value=""> Select One </option>
                <option> Mountains </option>
                <option> Sea </option>
                <option> Sky </option>
                <option> Forest </option>
                <option value="snow"> Winter </option>
            </select>  
            
            <input type="submit" name="submitBtn" value="Go!" />
        </form>


      <?php
      
       if ( isset($keyword) && !empty($keyword) ) {
      
      ?>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <?php
              for ($i=1; $i < 10; $i++) {
                echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
              }
            ?>
           <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li> -->
          </ol>
          <div class="carousel-inner">
            <!--<div class="carousel-item active">
              <img class="d-block w-100" src="<?=$imageURLs[0]?>" alt="First slide">
            </div>-->
            
            <?php
            for ($i=0; $i < 10; $i++) {
               echo "<div class='carousel-item "; 
               echo ($i == 0)?" active ":"";   //ternary operator, it's exactly the same as condition below
               
              // if ($i == 0) {
              //   echo " active ";
              // }
               
               echo "'>";
               echo "<img class=\"d-block w-100\" src=\"".$imageURLs[$i]."\" alt=\"Second slide\">";
               echo "</div>";
            }
            ?>
         
          </div>
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
        
       } //closes if statement (if isset($keyword) )
       
       ?>


    
        <h1>You must type a keyword or select a category</h1>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>