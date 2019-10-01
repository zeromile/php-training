<?php
$servername = "localhost";
$username = "root";
$password = "secret";

// Create connection
$conn = new mysqli($servername,$username,$password);

// Check connection
if ($conn->connect_error) {
  die("No worky " . $conn->connect_error);
} else {
  $success = "It worked!";
}
