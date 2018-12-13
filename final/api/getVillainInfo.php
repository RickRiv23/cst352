<?php
    include '../../SQLConnection.php';
    $dbConn = getConnection("heroes");
    
    function displayVillain() {
        global $dbConn;
        
        $sql = "SELECT * FROM `Villains` WHERE villain_id = :id";
                
        $namedParameters = array();
        $namedParameters[":id"] = $_GET['id'];
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($namedParameters);
        // $stmt->execute();
        $villain = $stmt->fetch(PDO::FETCH_ASSOC); 
        // print_r($hero); 
        return $villain;
    }        
    
    $villain = displayVillain();
    
    echo json_encode($villain);
?>