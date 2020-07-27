<?php

session_start();

$_firstname = $_POST['firstname'];
$_lastname = $_POST['lastname'];
$_username = $_POST['username'];
$_role = $_POST['role'];

//echo $_firstname;

//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=amado", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert Command
$query = "INSERT INTO `admins` (`firstname`,`lastname`, `username`, `role`) VALUES (:firstname, :lastname, :username, :role)";

//Prepare a statement
$stmt = $conn->prepare($query);
//Bind
$stmt->bindParam(':firstname',$_firstname);
$stmt->bindParam(':lastname',$_lastname);
$stmt->bindParam(':username',$_username);
$stmt->bindParam(':role',$_role);
//Execution
$result=$stmt->execute();
//Message
if ($result){
    $_SESSION['message']= "Admin is added Successfully!";
}else{
    $_SESSION['message']= "Sorry, admin is not added.";
}
//Redirect
header("location:index.php");