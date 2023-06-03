<?php
include 'connect.php';
// creating questions table
$sql="CREATE TABLE IF NOT EXISTS questions(
    num INT PRIMARY KEY,
    text VARCHAR(255)
)";
$result=mysqli_query($conn,$sql);
// creating choices table
$sql="CREATE TABLE IF NOT EXISTS choices(
    id INT PRIMARY KEY AUTO_INCREMENT,
    question_num INT,
    is_correct TINYINT DEFAULT 0,
    text VARCHAR(255),
    FOREIGN KEY(question_num) REFERENCES questions(num)
)";
$result=mysqli_query($conn,$sql);
