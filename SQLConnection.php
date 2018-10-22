<?PHP

function getConnection($dbname){
    //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["us-cdbr-iron-east-01.cleardb.net"];
        $dbname = substr($url["heroku_e7a1e58035b76c5"], 1);
        $username = $url["bfc457d1a0cdba"];
        $password = $url["pass"];
    }else{
        //  Creating database connection
        $host = "localhost";    //  for c9
        /*$dbname = $name;*/     //  Database Name
        
        //  Database Login Credentials
        $username = "root";
        $password = "";
    }
    
    
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}
?>