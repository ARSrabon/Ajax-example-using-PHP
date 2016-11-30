<?php
$server_name = "localhost";
$username = "root";
$password = "";
//    $dbname = "sms_test_db";
$dbname = "app";

    // Create Connection to Mysql Database
    $conn = new mysqli($server_name , $username , $password , $dbname);

    // Check Connection.
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
 ?>