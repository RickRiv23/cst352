<?PHP

include '../../SQLConnection.php';
$dbname = "quotes";
$dbConn = getConnection($dbname);

function displayAuthorInfo(){
  global $dbConn;
  
  $authorId = $_GET['authorId'];
  
  $sql_command = "SELECT * FROM q_author WHERE authorId = $authorId";
  
  $statement = $dbConn->prepare($sql_command);
  $statement->execute();
  $record = $statement->fetch(PDO::FETCH_ASSOC); //We expect only ONE record
 
  //print_r($record);
  
  echo "<h4 class='authorInfo'>Bio: " . $record['bio'] . "</h4><br>";
  echo "<p class='authorInfo'>Day of Birth: " . $record['dob'] . "</p><br>";
  echo "<p class='authorInfo'>Day of Dead: ". $record['dod'] . "</p><br>";
  echo "<img src='".$record['picture']."' alt='Author Picture' height='100' width='100'></img><br>";
 
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Author Info </title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <?php error_reporting(0);?>
        <h2> Author Info </h2>

        <br>
        <div class="authorInfo__container">
        <?=displayAuthorInfo()?>
        </div>
    </body>
</html>