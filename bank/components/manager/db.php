<?php
$servername="localhost";
$username="root";
$password="";
$dbname="bank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function generateRandomNumber($length) {
    $min = pow(10, $length - 1);
    $max = pow(10, $length) - 1;
    return mt_rand($min, $max);
}
$randomNumber = generateRandomNumber(10);
?>