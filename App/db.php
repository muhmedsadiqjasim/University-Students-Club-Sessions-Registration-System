<?php
$hostname = "localhost";
$username = "root";
$password = "HamHamHam9911";
$database = "uscsrs";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>