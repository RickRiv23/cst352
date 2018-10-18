<?PHP
    include '../../SQLConnection.php';
    $dbname = "quotes";
    $dbConn = getConnection($dbname);
    
    
    
    function display_all(){
        global $dbConn;
        
        $sql_command = "SELECT quote FROM q_quotes";
        $statement = $dbConn->prepare($sql_command);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record){
            echo $record['quote'] . "<br>";
        }
    }
    
    function display_fromShort(){
        global $dbConn;
        
        $sql_command = "SELECT quote FROM `q_quotes` ORDER BY Length(quote)";
        $statement = $dbConn->prepare($sql_command);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record){
            echo $record['quote'] . "<br>";
        }
    }
    
    function display_rand(){
        global $dbConn;
        
        $randomRecord = rand(0,26);
        $sql_command = "SELECT * FROM q_quotes 
                NATURAL JOIN q_author  
                LIMIT $randomRecord,1";
        $statement = $dbConn->prepare($sql_command);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record){
            echo $record['quote'] . "<br>";
            echo "<a target='authorInfo' href='authorInfo.php?authorId=".$record['authorId']."'>";
            echo  $record['firstName'] . "  " . $record['lastName'];
            echo "</a>";
        }
    }
    

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Random Quotes</title>
        <meta charset="UTF-8">
        
    </head>
    
    <body>
        <h1>LAB 5</h1>
        
        <h3>RANDOM QUOTE</h3>
        
        <div>
            <?= display_rand() ?>
        </div>
        
        <br>
        
        <iframe name="authorInfo" frameborder="0" width="600" height="300"> </iframe>
    </body>
</html>