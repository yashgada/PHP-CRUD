<?php
session_start();
include "db_conn.php";

    // echo var_dump($_SERVER["REQUEST_METHOD"]);
// if ($_SERVER["REQUEST_METHOD"] === "POST"){echo var_dump($_POST);}

// Basic check for form being sent
if($_POST['Update'] === "Update"){
    // echo "This works";
    // echo var_dump($_POST);
    
    // construct the SQL query to be updated
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $id = $_SESSION['id'];
$sql = "UPDATE users SET name = '$name',phone = '$phone', address = '$address' WHERE id = '$id'";
// echo $sql;


// $result = mysqli_query($conn, $sql);
//         if (mysqli_num_rows($result) === 1) {
//             echo "It might be done, check";
//         }


        if(!mysqli_query($conn, $sql)){
    // echo "Records inserted successfully.";
        exit("ERROR: Could not execute $sql. ". mysqli_error($conn));
            }else{
                $_SESSION['updated']=true;
                $_SESSION['name']=$name;
                $_SESSION['phone']=$phone;
                $_SESSION['address']=$address;
                header("Location: updated.php");
            }
}

?>