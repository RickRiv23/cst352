<?php

session_start();

//verifies that username and password are valid

 include '../../SQLConnection.php';
 $dbConn = getConnection("quotes");

 $username = $_POST['username'];
 $password = sha1($_POST['password']);
 
 
 // This command works but will be easily hacked using true pass ('or 1=1 or')
/* $sql_command = "SELECT * 
         FROM q_admin 
         WHERE username = '$username' 
         AND   password = '$password' ";*/
         
         
         
//  This command will prevent SQL injection and true pass hacking
 $sql = "SELECT * 
         FROM q_admin 
         WHERE username = :u
         AND   password = :password ";

 $namedParameters = array();
 $namedParameters[":u"] = $username;
 $namedParameters[":password"] = $password;


 
 echo $sql;
 
 $statement = $dbConn->prepare($sql);
 $statement->execute($namedParameters);
 $record = $statement->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
 
//  print_r($record);

if(empty($record)){
    echo "Error: Invalid Username or Password";
}else{
    $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
    
    header("location: main.php");       //  Redirects to another program
}

?>