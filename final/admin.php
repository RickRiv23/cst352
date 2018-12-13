<?php
    session_start();
    include '../SQLConnection.php';
    $dbConn = getConnection("heroes");
    
    function displayAllHeroes() {
        global $dbConn;
            
        $sql = "SELECT hero_id, name, fullName, universe
                FROM Superheroes
                ORDER BY fullName";
                
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $heroes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($heroes as $hero) {
            echo "<a   class='btn btn-primary' role='button' href='updateHero.php?hero_id=".$hero['hero_id']."'>Update</a> ";
            echo "<form action='deleteHero.php' onsubmit='return confirmDelete()' >";
            echo "<input type='hidden' name='hero_id' value='".$hero['hero_id']."'>";
            echo "<button class='btn btn-outline-danger' type='submit'>Delete</button>";
            echo "</form>";
            echo "<a onclick='openModal()' target='heroModal' href='heroInfo.php?hero_id=".$hero['hero_id']."'>" . $hero['name'] . ", " . $hero['fullName'] . "</a>, ";
            echo $hero['universe'] . "<br><br>";
       }
           
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Section</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" type="text/css" /> 
        <style>
            
            form {
                display:inline-block;
            }
            
        </style>
        
        <script>
            
            function confirmDelete() {
                
                return confirm("Are you sure you want to delete this author?");
            }
            
            function openModal() {
                
                $('#myModal').modal("show");

            }
        </script>
    </head>
    <body>
        <div class="jumbotron">
            <h1>Admin Section</h1>
            <h3>Welcome <?= $_SESSION['adminSesh'] ?></h3>
        </div>
        <br><br>
        
        <form action="addHero.php">
            <input type="submit" name="addHero" value="Add a New Hero"/>
        </form>
        <form action="logout.php">
            <input type="submit" name="logout" value="Logout"/>
        </form>
        
        <br><br>
        <?= displayAllHeroes() ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Hero Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe name="heroModal" width='450' height='200'></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>