<!DOCTYPE html>
<html>
    <head>
        <title>Lab 6</title>
        <style type="text/css">
            html{
                text-align: center;
            }
            .error{
                color: red;
            }
        </style>
    </head>
    <body>
        <h1>Admin Login</h1>
        
        <form action="loginProcess.php" method="post">
            
            Username: <input type="text" name="username" /><br>
            Password: <input type="password" name="password" /><br>
            
            <input type="submit" value="Login!">
            
        </form>
        
        <div class="error">
        <?php
        
        if(isset($_SESSION["error"])){
            $error = $_SESSION["error"];
            echo "<span>$error</span>";
        }
        
        ?>
        </div>
    </body>
</html>