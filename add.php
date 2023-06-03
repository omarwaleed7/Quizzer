<?php
include 'connect.php';
// get post values
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){
    session_start();
    $question_number=mysqli_escape_string($conn,$_POST['question_number']);
    $question_text=mysqli_escape_string($conn,$_POST['question_text']);
    $correct_choice=mysqli_escape_string($conn,$_POST['correct_choice']);
    $choices= array();
    for($i=1; $i<=5; $i++){
        $choices[$i]=mysqli_escape_string($conn,$_POST["choice$i"]);
    }
    // questions query
    $sql="INSERT INTO questions(num,text) VALUES ($question_number,'$question_text')";
    $result=mysqli_query($conn,$sql);
    // validate questions
    if($result){
        foreach ($choices as $choice => $value){
            // validate choices
            if(!$value==''){
                if($choice==$correct_choice){
                    $is_correct=1;
                }
                else{
                    $is_correct=0;
                }
                $sql="INSERT INTO choices(question_num,is_correct,text) VALUES($question_number,$is_correct,'$value')";
                $result=mysqli_query($conn,$sql);
                // validate insert
                if($result){
                    continue;
                }
                else{
                    die("error:".mysqli_error());
                }
            }
        }
        $_SESSION['msg']="Question added";
    }
}
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
            <p><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];
            unset($_SESSION['msg']);}?></p>
			<h1>Add A Question</h1>
			<form method="post" action="add.php">
				<p>
					<label>Question Number: </label>
					<input type="number" value="<?php echo $count['questions_num']+1;?>" name="question_number" />
				</p>
				<p>
					<label>Question Text: </label>
					<input type="text" name="question_text" />
				</p>
				<p>
					<label>Choice #1: </label>
					<input type="text" name="choice1" />
				</p>
				<p>
					<label>Choice #2: </label>
					<input type="text" name="choice2" />
				</p>
				<p>
					<label>Choice #3: </label>
					<input type="text" name="choice3" />
				</p>
				<p>
					<label>Choice #4: </label>
					<input type="text" name="choice4" />
				</p>
				<p>
					<label>Choice #5: </label>
					<input type="text" name="choice5" />
				</p>
				<p>
					<label>Correct Choice Number: </label>
					<input type="number" name="correct_choice" />
				</p>
				<p>
					<input type="submit" name="submit" value="Submit" />
				</p>
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