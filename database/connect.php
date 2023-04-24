<?php
$servername = "https://yadak.center";
$username = "yadakcenter2";
$password = "vZun$2*04Bo]";
$dbname = "yadakcenter2_yadakinfo_price";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

define('conn', $conn);