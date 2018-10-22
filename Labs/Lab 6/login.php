<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6</title>
    </head>
    <body>
        <h1>Admin Login</h1>
        
        <form action="loginProcess.php" method="post">        <!--Verifies that username and password are valid-->
            <label for="username">Username:</label><input type="text" name="username"/><br>
            <lable for="password">Password:</lable><input type="text" name="password"/>
            
            <br>
            
            <input type="submit" value="Login"/>
        </form>
    </body>
</html>