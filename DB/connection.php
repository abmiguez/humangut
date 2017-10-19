<?php
$servername = "localhost";
$username = "humangutuser";
$password = "humangutpass";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>