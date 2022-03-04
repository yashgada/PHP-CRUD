<?php
$sname= "localhost";
$unmae= "bhvpsspa_test2";
$password = "passphrase1";
$db_name = "bhvpsspa_test2";
$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if (!$conn) {
    echo "Connection failed!";
}