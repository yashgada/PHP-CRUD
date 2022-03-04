<?php 

// start a session
session_start();

// Make the db connection, giving the $conn connection variable to the database
include "db_conn.php";

// Check values set and format them
if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data){
        // remove whitespacing
       $data = trim($data);
    //   e
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    
    
    $uname = validate($_POST['uname']);
    // maybe hash the password here ****************************************************************
    $pass = validate($_POST['password']);
    
    
    // Checking username and password
    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    }else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }else if($_POST['submit'] === "Login"){
        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            
            // might not need this line here *******************************************************
            if ($row['user_name'] === $uname && $row['password'] === $pass) { 
                // echo "Logged in!";
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['address'] = $row['address'];
                // echo "Here are the session variables: ";
                // echo var_dump($_SESSION);
                header("Location: home.php");
                exit();
            }else{
                header("Location: index.php?error=Incorect User name or password");
                exit();
            }
        }else{
            header("Location: index.php?error=Incorect User name or password");
            exit();
        }
    }else if($_POST['submit'] === "Register"){
        // echo "you clicked on register";
        $sql = "SELECT * FROM users WHERE user_name='$uname'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
        // echo "username taken";
        header("Location: index.php?error=User Name is Taken");
        }else{
            $sql = "INSERT INTO users (user_name, password) VALUES ('".$uname."', '".$pass."')";
            // mysqli_query($conn, $sql);
            // exit()
            // if ($result = mysqli_query($conn, $sql)){
            //     exit($result);
            // }
            
            if(!mysqli_query($conn, $sql)){
    // echo "Records inserted successfully.";
        exit("ERROR: Could not able to execute $sql. ". mysqli_error($conn));
            }
//  else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);}
    
            header("Location: index.php?error=User Created");
        }
    }
}else{
    header("Location: index.php");
    exit();
}