<?php

session_start();

$_ques_id = $_GET['id'];

//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=online_exam", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Command
$query = "DELETE FROM `question` WHERE `question`.`id` = :id";

//Prepare a statement
$stmt = $conn->prepare($query);

//Bind
$stmt->bindParam(':id',$_ques_id);

$result=$stmt->execute();

//Message
if ($result){
    $_SESSION['message']= "question is deleted Successfully!";
}else{
    $_SESSION['message']= "Sorry, not deleted.";
}
//Redirect
header("location:index.php");