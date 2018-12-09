<?php 
include '../../../SQLConnection.php';
$dbname = "pets";
$dbConn = getConnection($dbname);

function displayAllPets(){
    global $dbConn;
    
    $sql = "SELECT name, type, id
              FROM pets
              ORDER BY name";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $pets = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    return $pets;
}
?>
<!DOCTYPE html>
<html>
    
    <head>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="static-assets/css/styles.css" type="text/css" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        
        
        <style type="text/css">
            body {
                text-align: center !important;
            }
            
            
            #carouselExampleIndicators{
                width: 400px;
                margin: auto;
            }
        </style>
    </head>       
 <?php
   include "inc/header.php";
  ?>
    <script src="static-assets/js/functions.js">
    </script>
  <?php 
    $pets = displayAllPets();
    
    foreach($pets as $pet) {
        echo "<div class='pet'><b>Name</b>: ". "<a href='#' class='petLink' id='". $pet["id"]. "'>" .$pet["name"]. "</a><br>";
        echo "<b>Type</b>: " .$pet["type"]. "</div><br><br>" ;
    }
  ?>
  
  
    <!-- Modal -->
    <div class="modal fade" id="petInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="petName"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="petInfo">
                <!-- this is an html element -->
                <img id="petImg" src="" width="150"></img><br>
                <div class="petModal--info">
                  <b>About</b>: <span id="petDescription"></span> <br>
                  <b>Type</b>: <span id="type"></span> <br>
                  <b>Breed</b>: <span id="breed"></span> <br>
                  <b>Color</b>: <span id="color"></span> <br>
                  </div>
                
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           
          </div>
        </div>
      </div>
    </div>
    <?php
        include "inc/footer.php";
    ?>
  
  
</html>