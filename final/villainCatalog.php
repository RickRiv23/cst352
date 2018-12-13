<?php
    include '../SQLConnection.php';
    $dbConn = getConnection("heroes");
    
    function displayAllVillains() {
        global $dbConn;
        
        $sql = "SELECT *
                FROM `Villains` 
                ORDER BY name";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $villains = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $villains;
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Catalog</title>
        <link href="https://fonts.googleapis.com/css?family=Acme|Work+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="css/styles.css" rel="stylesheet" type="text/css" /> 
        <script>
            $(document).ready(function(){
                    $('.villImg').click(function(){
                        alert( $(this).attr("id") );
                    
                        $('#villInfoModal').modal("show");
                    
                        $.ajax({
                                
                            type: "GET",
                            url: "api/getVillInfo.php",
                            dataType: "json",
                            data: { "id": $(this).attr("id") },
                            success: function(data,status) {
                                // alert(data);
                                $("#heroModalLabel").html(data.name);
                                $("#realName").html(data.fullName);
                                $("#gender").html(data.gender);
                                $("#species").html(data.race);
                                $("#power").html(data.powers);
                                $("#universe").html(data.universe);
                                $("#heroDescription").html(data.bio);
                                $("#heroImg").attr("src", data.img);
                               
                            },
                            complete: function(data,status) { //optional, used for debugging purposes
                            //   alert(status);
                            }
                            
                        });//ajax
                    }); 
              });
        </script>
        
        <style>
            body {
                background-image: url("img/thunder.jpg");
                text-align: center;
                background-size: cover;
            }
            
            img {
                max-width: 40%;
                height: auto;
            }    
            
            #catalog {
                
                display: flex;
                flex-wrap: wrap;
                
            }
            
            #imgDiv {
                width: 30%;
                margin: 0 auto;
            }
        </style>
    </head>
    <body >
    <div id="container">
        <div class="container-b">
        <div class="nav-container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="index.html">Superhero</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-item nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
                  <a class="nav-item nav-link" href="search.php">Search</a>
                  <a class="nav-item nav-link active" href="catalog.php">Catalog</a>
                  <a class="nav-item nav-link" href="login.php">Login</a>
                </div>
              </div>
            </nav>
        </div>
        
        <div class="jumbotron jumbotron-fluid">
            <h1>VILLAIN INDEX</h1>
            <h4>Catalog</h4>
        </div>  
        <div id="catalog">
            
                <?php
                
                $villains = displayAllVillains();
                
                foreach($villains as $villain) {
                    echo "<div class='villDiv' id='imgDiv'><a href='#' class='imgLink'><img id='" . $villain["villain_id"] . "' class='villImg' src='" . $villain["img"] . "' width='40%'></a><br>'".$villain["name"]."'</div>";
                }
                
                ?>
          
            </div>
            
            <div class="modal fade" id="villInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="villName"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div id="villInfo">
                        
                     <img id="heroImg" src="" alt="Character Image" width="150"><br>
                     <div style="margin: 10px auto; background: whitesmoke; padding: 5px; border-radius: 8px;">
                         <b>Identity: </b><span id="realName"> </span> <br>
                         <b>Gender: </b><span id="gender"> </span> <br>
                         <b>Species: </b><span id="species" ></span> <br>
                         <b>Power: </b><span id="power"></span> <br>
                         <b>Universe: </b><span id="universe"></span> <br>
                         <b>Biography: </b><span id="heroDescription"></span> <br>
                     </div>
                        
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="fixed-bottom">
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
              <div class="btn-group mr-2" role="group" aria-label="First group">
                <a href="catalog.php" button type="button" class="btn btn-light">Go to the Heroes Catalog!</a>
               
              </div>
            </div>
        </div>
        </div>
    </div> 
</div>    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    </body>
</html>