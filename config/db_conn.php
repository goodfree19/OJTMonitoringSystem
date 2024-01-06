<?php
$servername = "localhost";
$username = "u700659242_OJTUSER";
$password = "OJT@year2024_01_05";
$dbname = "u700659242_OJTDB";
// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>