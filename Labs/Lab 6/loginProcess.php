<?php
 session_start(); 
   
 include '../../SQLConnection.php';
 $dbConn = getConnection("quotes");
 $username = $_POST['username'];
 $password = sha1($_POST['password']);
    
         
   $sql = "SELECT *
           FROM q_admin
           WHERE username = :u;
           AND password = :password";
         
         
   $namedParameters = array();
   $namedParameters[":u"] = $username;
   $namedParameters[":password"] = $password;
   
 //echo $sql;
 $stmt = $dbConn->prepare($sql);
 $stmt->execute($namedParameters);
 $record = $stmt->fetch(PDO::FETCH_ASSOC);
 
 //print_r($record);
 if (empty($record) || empty($username) || empty($password)){
     
     $_SESSION["error"] = "ERROR: Incorrect USERNAME or PASSWORD";
     header("location: login.php");
     exit();
     
    // echo "Error: Wrong Username or Password!";
     
 } else {
     $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
     header("location: main.php");
     
 }
 
 
?>