<?php
include 'connect.php';
// creating questions number
if(isset($_GET['n'])) {
    $num = $_GET['n'];
    $sql = "SELECT count(num) AS questions_num FROM questions ";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_fetch_assoc($result);
    // showing questions
    $sql = "SELECT * FROM questions WHERE num=$num";
    $result = mysqli_query($conn, $sql);
    $questions = mysqli_fetch_assoc($result);
    // showing choices
    $sql = "SELECT * FROM choices WHERE question_num=$num";
    $choices = mysqli_query($conn, $sql);
}
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
			<div class="current">Question <?php echo $questions['num'] ?> of <?php echo $count['questions_num']; ?></div>
			<p class="question">
				<?php echo $questions['text'] ?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
                    <?php while($row=mysqli_fetch_assoc($choices)):?>
					<li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text'];?></li>
				    <?php endwhile; ?>
                </ul>
				<input type="submit" name="submit" value="Submit" />
                <input type="hidden" name="number" value="<?php echo $num?>">
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2023, Quizzer
		</div>
	</footer>
</body>
</html>