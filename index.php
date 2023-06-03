<?php
include 'connect.php';
// creating questions number
$sql="SELECT count(num) AS questions_num FROM questions ";
$result=mysqli_query($conn,$sql);
$num=mysqli_fetch_assoc($result);
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
			<h2>Test Your Programming Knowledge</h2>
			<p>This is a multiple choice quiz to test your knowledge of Programming</p>
			<ul>
				<li><strong>Number of Questions: </strong><?php echo $num['questions_num']; ?></li>
				<li><strong>Type: </strong>Multiple Choice</li>
				<li><strong>Estimated Time: </strong><?php echo $num['questions_num']*1.5; ?> Minutes</li>
			</ul>
			<a href="question.php?n=1" class="start">Start Quiz</a>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2023, Quizzer
		</div>
	</footer>
</body>
</html>