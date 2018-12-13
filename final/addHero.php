<?php

session_start();

if (!isset($_SESSION['adminSesh'])) {
    
    header("Location: login.php");
    
}

if (isset($_GET['addHeroForm'])) {  //checks whether the form has been submitted

 include '../sqlConnection.php';
 $dbConn = getConnection("heroes");
    
  $name = $_GET['name'];  
  $fullName = $_GET['fullName'];   
  $gender = $_GET['gender'];
  $powers = $_GET['powers'];
  $race = $_GET['race'];
  $universe = $_GET['universe'];
  $bio = $_GET['bio'];
  $img = $_GET['img'];
  
  
  $sql = "INSERT INTO Superheroes (name, fullName, powers, race, universe, bio, img)
            VALUES (:name, :fn, :powers, :race, :universe, :bio, :img);";
                 
  $namedParameters = array();
  $namedParameters[':name'] = $name;
  $namedParameters[':fn'] = $fullName;
  $namedParameters[':gender'] = $gender;
  $namedParameters[':powers'] = $powers;
  $namedParameters[':race'] = $race;
  $namedParameters[':universe'] = $universe;
  $namedParameters[':bio'] = $bio;
  $namedParameters[':img'] = $img;

  $stmt = $dbConn->prepare($sql);                 
  $stmt->execute($namedParameters); //This will insert the record!
  
  echo "Hero was added!";
 
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Add New Hero </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" /> 
    </head>
    <body>

        <h1> Adding New Hero</h1>
        
        <form>
            
            Hero Name: <input type="text" name="name"/> <br />
            Full Name: <input type="text" name="fullName"/> <br />
            Gender: 
            <input type="radio" name="gender" value="M" id="genderMale"/>
                <label for="genderMale">Male</label>
            <input type="radio" name="gender" value="F" id="genderFemale"/> 
                <label for="genderFemale">Female</label><br>
            
            Powers: <input type="text" name="powers"/> <br />
            Race: <input type="text" name="race"/> <br>
            Universe: <input type="text" name="universe"/> <br>
            
            Image URL: <input type="text" name="img"/><br>
            Bio: 
            <textarea name="bio" cols="50" rows="5"/></textarea>
            
            <br>

            <input type="submit" value="Add Hero" name="addHeroForm" />
        </form>
        
        <form action="admin.php">
                <input type="submit" name="main" value="Back"/>
        </form>
        
    </body>
</html>