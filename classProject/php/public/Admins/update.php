<?php

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

//var_dump($result);