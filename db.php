<?php
$host = 'localhost';
$db = 'mynotes';
$user = 'root';
$pass = 'Hardolin5';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
