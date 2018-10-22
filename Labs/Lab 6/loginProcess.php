<?php
//verifies that username and password are valid

 include '../../SQLConnection.php';
 $dbConn = getConnection("quotes");

 $username = $_POST['username'];
 $password = sha1($_POST['password']);

 $sql = "SELECT * FROM q_admin WHERE username = '$username' AND password = '$password' ";
 
 echo $sql;
 
 $stmt = $dbConn->prepare($sql);
 $stmt->execute();
 $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
 
 print_r($record);

if(empty($record)){
    echo "Error: Wrong Username or Password!!!!!";
}else{
    $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
    
    header("location: main.php");       //  Redirects to another program
}

?>