<?php
   
 include '../../SQLConnection.php';
 $dbConn = getConnection("quotes");
 
    $username = $_GET['username'];
 
    $sql = "SELECT * 
         FROM q_admin 
         WHERE username = :username";
         
    $stmt = $dbConn->prepare($sql);
    $stmt->execute(array(":username"=>$username));
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
    
    echo json_encode($record);
 
    
?>