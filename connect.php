<?php
// creating connection essentials
$host = "localhost:3307";
$user = "root";
$pass = "";
$db_name = "quizzer";
$conn = mysqli_connect($host, $user, $pass);
if (!$conn) {
    echo "CONNECTION FAILED: " . mysqli_connect_error();
}
// creating db
$sql="CREATE DATABASE IF NOT EXISTS quizzer";
$result=mysqli_query($conn,$sql);
$conn = mysqli_connect($host, $user, $pass,$db_name);
if (!$conn) {
    echo "CONNECTION FAILED: " . mysqli_connect_error();
}