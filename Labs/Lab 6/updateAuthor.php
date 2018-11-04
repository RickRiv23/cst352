<?php

include '../../SQLConnection.php';
$dbname = "quotes";
$dbConn = getConnection($dbname);

function getAuthorInfo() {
    global $dbConn;
    
    $sql = "SELECT * FROM `q_author` WHERE authorId = "  . $_GET['authorId'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $record;
    
    
}

if (isset($_GET['updateAuthorForm'])) { // User submitted the form
    
    $sql = "UPDATE `q_author` 
            SET   firstName = :firstName,
                  lastName  = :lastName,
                  gender    = :gender,
                  dob       = :dob,
                  dod       = :dod,
                  profession= :profession,
                  country   = :country,
                  picture   = :picture,
                  bio       = :bio
              WHERE authorId = " . $_GET['authorId'];
    $np = array();
    $np[":firstName"] = $_GET['firstName'];
    $np[":lastName"]  = $_GET['lastName'];
    $np[":dob"]       = $_GET['dob'];
    $np[":dod"]       = $_GET['dod'];
    $np[":profession"] = $_GET['profession'];
    $np[":country"]    = $_GET['country'];
    $np[":picture"]    = $_GET['imageUrl'];
    $np[":bio"]        = $_GET['bio'];
    $np[":gender"]     = $_GET['gender'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
    echo "Author info was updated!";
    
}



if (isset($_GET['authorId'])) {
    
    $authorInfo = getAuthorInfo();
    //print_r($authorInfo);
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Author </title>
    </head>
    <body>
        
        <h1> Updating Author Info </h1>
        
          <form>
            First Name: <input type="text" name="firstName" value="<?= $authorInfo['firstName'] ?>" /> <br />
            Last Name: <input type="text" name="lastName"   value="<?= $authorInfo['lastName'] ?>"/> <br />
            Gender: 
            <input type="radio" name="gender" value="M" id="genderMale"  
            
              <?php
              
                 if ($authorInfo['gender'] == "M") {
                     
                     echo " checked ";
                     
                 }
              
              ?>

            />
                <label for="genderMale">Male</label>
            <input type="radio" name="gender" value="F" id="genderFemale"  <?= ($authorInfo['gender'] == "F")?"checked":"" ?> /> 
                <label for="genderFemale">Female</label><br>
            
            Day of birth: <input type="text" name="dob"  value="<?= $authorInfo['dob'] ?>"/> <br />
            Day of death: <input type="text" name="dod"  value="<?= $authorInfo['dod'] ?>"/> <br />
            Country: <input type="text" name="country"   value="<?= $authorInfo['country'] ?>"/> <br>
            Profession: <input type="text" name="profession" value="<?= $authorInfo['profession'] ?>"/> <br>
            
            Image URL: <input type="text" name="imageUrl" value="<?= $authorInfo['picture'] ?>" size="40"/><br>
            Bio: 
            <textarea name="bio" cols="50" rows="5"/> <?= $authorInfo['bio'] ?> </textarea>
            
            <br>

            <input type="submit" value="Update Author" name="updateAuthorForm" />
        </form>
        

    </body>
</html>