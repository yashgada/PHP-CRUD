<?php 
session_start();
    if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
        include "db_conn.php";
         ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>HOME</title>
                <link rel="stylesheet" type="text/css" href="style.css">
            </head>
            <body>
                <!--<?php echo var_dump($_SESSION); ?>-->
                <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
                 <h1>Hello, <?php echo $_SESSION['user_name']; ?></h1>
                 <h2>The method by which you reach here is: 
                 <!--<?php if($_SERVER["REQUEST_METHOD"] === "POST"){echo 1;} ?>-->
                 <?php echo var_dump($_SERVER["REQUEST_METHOD"]) ?>
                 </h2>
                 <!--<p>Session ID is: <?php echo $_SESSION['id']; ?></p>-->
                 <form action="update.php" method="POST">
  <!--<fieldset>-->
    <legend>Personal information:</legend>
    
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $_SESSION['name']; ?>">
    <br>
    <label for="phone">Phone Number:</label><br>
    <input type="number" id="phone" name="phone" value="<?php echo $_SESSION['phone']; ?>">
    <br>
    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address" value="<?php echo $_SESSION['address']; ?>">

    <br><br>
    <input type="submit" name="Update" value="Update">
  <!--</fieldset>-->
</form>
                 
                 <a href="logout.php">Logout</a>
            </body>
        </html>
        <?php 
    }else{
         header("Location: index.php");
         exit();
    }
 ?>