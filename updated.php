<?php
session_start();
if(isset($_SESSION['id'])){ 
    // echo var_dump($_SESSION);
    
    // CHECK UPDATED FLAG
    if($_SESSION['updated']===true){ ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
        <h1>Updated!</h1>
        <a href="home.php">Back to Dashboard?</a>
</body>
</html>
    
    <?php
    
    echo "<h1> Seems set</h1>";
    
    // SET THE FLAG BACK TO FALSE
    $_SESSON['updated']=false;
    }else{
        // header("Location: logout.php?");
        echo "<h1>here are the values</h1>";
        echo var_dump($_SESSION);
    }
?>
<?php }
?>