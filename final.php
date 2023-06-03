<?php
include 'connect.php';
session_start();
// creating questions number
$sql = "SELECT count(num) AS questions_num FROM questions ";
$result = mysqli_query($conn, $sql);
$count = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>Quizzer</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<header>
		<div class="container">
			<h1>Quizzer</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>You're Done!</h2>
				<p>Congrats! You have completed the test</p>
				<p>Final Score: <?php if(isset($_SESSION['score'])){
                        echo $_SESSION['score']*2;
                        unset($_SESSION['score']);
                    }?>/<?php echo $count['questions_num']*2;?></p>
				<a href="question.php?n=1" class="start">Take Again</a>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2023, Quizzer
		</div>
	</footer>
</body>
</html>