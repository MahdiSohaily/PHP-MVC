<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yadakinfo_price";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>