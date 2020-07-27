<?php

session_start();
$_id = $_POST['id'];
$_firstname = $_POST['firstname'];
$_lastname = $_POST['lastname'];
$_email_address = $_POST['email'];
$_gender = $_POST['gender'];
$_password = $_POST['password'];
//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=online_exam", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Insert Command
//UPDATE `applicant` SET `id` = '100', `first_name` = 'mm', `last_naem` = 'um', `email_address` = 'mm@gmail.com', `gender` = 'female', `password` = '123456' WHERE `applicant`.`id` = 1;
$query = "UPDATE `applicant` SET `first_name` = :firstname, `last_naem` = :lastname, `email_address` = :email, gender=:gender , `password` = :password WHERE `applicant`.`id` = :id;";
/*$query = "UPDATE `applicant` SET `id` = '300', `first_name` = 'm', `last_naem` = 's', `email_address` = 'mmm@gmail.com', `gender` = 'm', `password` = '123' WHERE `applicant`.`id` = 3;
";*/

//Prepare a statement
$stmt = $conn->prepare($query);
//Bind
$stmt->bindParam(':id',$_id);
$stmt->bindParam(':firstname',$_firstname);
$stmt->bindParam(':lastname',$_lastname);
$stmt->bindParam(':email',$_email_address);
$stmt->bindParam(':gender',$_gender);
$stmt->bindParam(':password',$_password);
//Execution
$result=$stmt->execute();
//Message
if ($result){
    $_SESSION['message']= "Student Details is updated Successfully!";
}else{
    $_SESSION['message']= "Sorry, Student Details is not updated.";
}
//Redirect
header("location:index.php");

?>

<?php
/*
session_start();

$_id = $_POST['id'];
$_firstname = $_POST['firstname'];
$_lastname = $_POST['lastname'];
$_username = $_POST['username'];
$_role = $_POST['role'];
//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=amado", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Command
$query = "UPDATE `admins` SET `firstname` = :firstname, `lastname` = :lastname, `username` = :username, `role` = :role WHERE `admins`.`id` = :id;";

//Prepare a statement
$stmt = $conn->prepare($query);
//Bind
$stmt->bindParam(':id',$_id);
$stmt->bindParam(':firstname',$_firstname);
$stmt->bindParam(':lastname',$_lastname);
$stmt->bindParam(':username',$_username);
$stmt->bindParam(':role',$_role);
//Execution
$result=$stmt->execute();
//Message
if ($result){
    $_SESSION['message']= "Admin is updated Successfully!";
}else{
    $_SESSION['message']= "Sorry, admin is not updated.";
}
//Redirect
header("location:index.php");

//var_dump($result);*/
