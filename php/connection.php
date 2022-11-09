<?php
$servername = "localhost";
$username = "root";
$password = "Kowshi@2001";
$database = "Kowshi";
$conn = new mysqli($servername, $username, $password,$database);
$response = "";
if ($conn->connect_error) {
  $response= "connection failed";
  die("Connection failed: " . $conn->connect_error);
}
?>