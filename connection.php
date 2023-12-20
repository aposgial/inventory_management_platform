<?php
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "inventory managment system"; // Replace with your database name

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed");
}
echo "Connected successfully";
?>
