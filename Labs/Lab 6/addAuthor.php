<?php


if (isset($_GET['addAuthorForm'])) {  //form has been submitted!
    
    echo "First Name: "  . $_GET['firstName'];    
    
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $gender = $_GET['gender'];
    $dob = $_GET['dob'];
    $dod = $_GET['dod'];
    $country = $_GET['country'];
    $profession = $_GET['profession']
    $image = $_GET['image'];
    $bio = $_GET['bio'];
    
    
    $sql = "INSERT INTO q_author (firstName, lastName, gender, dob, dod, country, profession, picture, bio) 
                 VALUES ( :fn, :lastName, :gender, :dob, :dod, :country, :profession, :picture, :bio);";
                 
    $namedParameters = array();
    $namedParameters[':fn'] = $firstName;
    $namedParameters[':lastName'] = $lastName;
    $namedParameters[':gender'] = $gender;
    $namedParameters[':dob'] = $dob;
    $namedParameters[':dod'] = $dod;
    $namedParameters[':country'] = $country;
    $namedParameters[':profession'] = $profession;
    $namedParameters[':picture'] = $imageUrl;
    $namedParameters[':bio'] = $bio;
    
    $stmt = $dbConn->prepare($sql);                 
    $stmt->execute($namedParameters); //This will insert the record!
    
    echo "Author was added!";
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Add New Author </title>
    </head>
    <body>

        <h1> Adding New Author</h1>
        
        <form>
            First Name: <input type="text" name="firstName"/> <br />
            Last Name: <input type="text" name="lastName"/> <br />
            Gender: 
            <input type="radio" name="gender" value="M" id="genderMale"/>
                <label for="genderMale">Male</label>
            <input type="radio" name="gender" value="F" id="genderFemale"/> 
                <label for="genderFemale">Female</label><br>
            
            Day of birth: <input type="text" name="dob"/> <br />
            Day of death: <input type="text" name="dod"/> <br />
            Country: <input type="text" name="country"/> <br>
            Image URL: <input type="text" name="image"/><br>
            Bio: <input type="textarea" cols="50" rows="5" name="bio"/><br>

            <input type="submit" value="Add Author" name="addAuthorForm"/>
        </form>
        
    </body>
</html>