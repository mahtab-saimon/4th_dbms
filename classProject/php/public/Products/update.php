<?php

session_start();

$_question = $_POST['question'];
$_option_a = $_POST['option_a'];
$_option_b = $_POST['option_b'];
$_option_c = $_POST['option_c'];
$_option_d = $_POST['option_d'];
$_Choose = $_POST['Choose'];


//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=online_exam", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$query = "INSERT INTO `question` (`question`,`option_a`, `option_b`, `option_c`, `option_d`, `Choose`) VALUES (:question, :option_a, :option_b, :option_c,:option_d,:Choose)";

//Insert Command
$query = "UPDATE `question` SET `question` = :question, `option_a` = :option_a, , `option_b` = :option_b, `option_c` = :option_c, `option_d` = :option_d, `Choose` = :Choose WHERE `products`.`id` = :id;";

//Prepare a statement
$stmt = $conn->prepare($query);
//Bind
$stmt->bindParam(':question',$_question);
$stmt->bindParam(':option_a',$_option_a);
$stmt->bindParam(':option_b',$_option_b);
$stmt->bindParam(':option_c',$_option_c);
$stmt->bindParam(':option_d',$_option_d);
$stmt->bindParam(':Choose',$_Choose);


//Execution
$result=$stmt->execute();
//Message
if ($result){
    $_SESSION['message']= "question is updated Successfully!";
}else{
    $_SESSION['message']= "Sorry, not updated.";
}
//Redirect
header("location:index.php");

//var_dump($result);