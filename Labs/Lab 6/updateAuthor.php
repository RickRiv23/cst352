<?php
session_start();

if (!isset($_SESSION['adminName'])) {
    
    header("Location: login.php");
    
}



include '../../SQLConnection.php';
$dbConn = getConnection("quotes");


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
    
    // echo "Author info was updated!";
    header("Location: main.php"); 
    
     echo "<script> alert('Author info was updated!'); </script>";
     echo "<script>setTimeout(\"location.href = 'login.php';\",100);</script>";
    
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
        <style type="text/css">
            html{
                text-align: center;
            }
            form{
                width: 60%;
                margin: 0px auto;
            }
        </style>
    </head>
    <body>
        
        <h1> Updating Author Info </h1>
        
          <form>
            <input type="hidden" name="authorId" value="<?= $authorInfo['authorId'] ?>" />
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
            
            Image URL: <input type="text" name="imageUrl" value="<?= $authorInfo['picture'] ?>" size="40"/><br><br>
            Bio: <br>
            <textarea name="bio" cols="50" rows="5"/> <?= $authorInfo['bio'] ?> </textarea>
            
            <br>

            <input type="submit" value="Update Author" name="updateAuthorForm" />
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </body>
</html>