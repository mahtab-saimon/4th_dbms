<?php

session_start();

$_id = $_GET['id'];
//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=online_exam", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Insert Command
$query = "DELETE FROM `applicant` WHERE `applicant`.`id` = :id";
//Prepare a statement
$stmt = $conn->prepare($query);
//Bind
$stmt->bindParam(':id',$_id);
$result=$stmt->execute();
//Message
if ($result){
    $_SESSION['message']= "Student Details  is deleted Successfully!";
}else{
    $_SESSION['message']= "Sorry, Student Details  is not deleted.";
}
//Redirect
header("location:index.php");