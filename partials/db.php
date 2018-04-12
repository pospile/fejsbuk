<?php

$servername = "35.187.189.40";
$username = "root";
$password = "25791998";
$db_name = "pgram";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
