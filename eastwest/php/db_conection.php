<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "testdb";

// Create connection
$dbcon = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$dbcon) {
    die("Connection failed: " . mysqli_connect_error());
}


?>