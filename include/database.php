<?php

$servername = "localhost";
$username = "simple";
$password = "simpleuser";
$database = "whole_wb";

// Create connection
$connect = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>