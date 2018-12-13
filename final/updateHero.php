<?php
session_start();

if (!isset($_SESSION['adminSesh'])) {
    
    header("Location: login.php");
    
}

include '../SQLConnection.php';
$dbConn = getConnection("heroes");


function getHeroInfo() {
    global $dbConn;
    
    $sql = "SELECT * FROM `Superheroes` 
            WHERE hero_id = "  . $_GET['hero_id'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $record;
    
    
}

if (isset($_GET['updateHeroForm'])) { // User submitted the form

    $sql = "UPDATE `Superheroes`
            SET   name      = :name,
                  fullName  = :fullName,
                  gender    = :gender,
                  powers    = :powers,
                  race      = :race,
                  universe  = :uni,
                  bio       = :bio,
                  img       = :image
            WHERE hero_id = " . $_GET['hero_id'];
    $np = array();
    $np[":name"]        = $_GET['name'];
    $np[":fullName"]    = $_GET['fullName'];
    $np[":gender"]      = $_GET['gender'];
    $np[":powers"]      = $_GET['powers'];
    $np[":race"]        = $_GET['race'];
    $np[":uni"]         = $_GET['universe'];
    $np[":bio"]         = $_GET['bio'];
    $np[":image"]       = $_GET['img'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
    echo "Hero info was updated!";
    
}



if (isset($_GET['hero_id'])) {
    
    $heroInfo = getHeroInfo();
    //print_r($authorInfo);
    
    
}




?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update Hero </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" /> 
    </head>
    <body>
        
        <h1> Updating Hero Info </h1>
        
          <form>
            <input type="hidden" name="hero_id" value="<?= $heroInfo['hero_id'] ?>" />
            Superhero Name: <input type="text" name="name" value="<?= $heroInfo['name'] ?>" /> <br />
            Real Full Name: <input type="text" name="fullName"   value="<?= $heroInfo['fullName'] ?>"/> <br />
            Gender: 
            <input type="radio" name="gender" value="M" id="genderMale"  
            
              <?php
              
                 if ($heroInfo['gender'] == "M") {
                     
                     echo " checked ";
                     
                 }
              
              ?>

            />
                <label for="genderMale">Male</label>
            <input type="radio" name="gender" value="F" id="genderFemale"  <?= ($heroInfo['gender'] == "F")?"checked":"" ?> /> 
                <label for="genderFemale">Female</label><br>
            
            Powers: <input type="text" name="powers"  cols="50" rows="5" value="<?= $heroInfo['powers'] ?>"/> <br />
            Race: <input type="text" name="race"   value="<?= $heroInfo['race'] ?>"/> <br>
            Universe: <input type="text" name="universe" value="<?= $heroInfo['uni'] ?>"/> <br>
            
            Image URL: <input type="text" name="img" value="<?= $heroInfo['image'] ?>" size="40"/><br>
            Bio: 
            <textarea name="bio" cols="50" rows="5"/> <?= $heroInfo['bio'] ?> </textarea>
            
            <br>

            <input type="submit" value="Update Hero" name="updateHeroForm" />
        </form>
        
        <form action="admin.php">
                <input type="submit" name="main" value="Back"/>
        </form>

    </body>
</html>