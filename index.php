<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
        <h2>LOGIN.</h2>
        
        <!--Check if there is any error and display it-->
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        
        
        <label> User Name </label>
        <input type="text" name="uname" placeholder="User Name"><br>
        
        
        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br> 
        
        
        <button type="submit" name="submit" formmethod="post" formaction="login.php" value="Login">Login</button>&nbsp
        <button type="submit" name="submit" formmethod="post" formaction="login.php" value="Register">Register</button>
        
        
     </form>
</body>
</html>