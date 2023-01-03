<?php
// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "uaspbd2";

// Create connection
// $connect = new mysqli($host, $username, $password, $database);
$connect = mysqli_connect('localhost','root','','uaspbd2');

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>