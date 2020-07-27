

<?php


session_start();

$_question = $_POST['question'];
$_ans_id = $_POST['ans_id'];
$_option_a = $_POST['option_a'];
$_option_b = $_POST['option_b'];
$_option_c = $_POST['option_c'];
$_option_d = $_POST['option_d'];
//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=online_exam", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Command
$query = "INSERT INTO `questions` (`question`,ans_id) VALUES (:question, :ans_id)";
$query1 = "INSERT INTO `answers` (`answer`,ans_id) VALUES (:answer, :ans_id)";

//Prepare a statement
$stmt = $conn->prepare($query);
$stmt1 = $conn->prepare($query1);
//Bind
$stmt1->bindParam(':ans_id',$_ans_id);
$stmt->bindParam(':ans_id',$_ans_id);
$stmt->bindParam(':question',$_question);
$stmt1->bindParam(':answer',$_option_a);
$stmt1->bindParam(':answer',$_option_b);
$stmt1->bindParam(':answer',$_option_c);
$stmt1->bindParam(':answer',$_option_d);


//Execution
$result=$stmt->execute();
$result1=$stmt1->execute();

//Message
if ($result){
    $_SESSION['message']= "question is added Successfully!";
}else{
    $_SESSION['message']= "Sorry, not added.";
}
//Redirect
header("location:index.php");