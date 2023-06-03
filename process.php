<?php
include 'connect.php';
session_start();
// getting post values
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){
    $choice=$_POST['choice'];
    $num=$_POST['number'];
    if(!isset($_SESSION['score'])){
        $_SESSION['score']=0;
    }
    // checking correct choices
    $sql="SELECT id FROM choices WHERE is_correct=1 && question_num=$num";
    $result=mysqli_query($conn,$sql);
    $correct_choice=mysqli_fetch_assoc($result);
    if($choice==$correct_choice['id']){
        $_SESSION['score']+=1;
    }
    $next=$num+1;
    // creating questions number
    $sql = "SELECT count(num) AS questions_num FROM questions ";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_fetch_assoc($result);
    if($num==$count['questions_num']){
        header("location:final.php");
    }
    else{
        header("location:question.php?n=$next");
    }
}