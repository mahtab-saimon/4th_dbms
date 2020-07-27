<?php
session_start();
//File Path Set
$approot=$_SERVER['DOCUMENT_ROOT'].'/classProject/php/public/';
$webroot="http://localhost/classProject/php/public/";


//Uploading Image
$_picture = $_FILES['picture']['name'];

$target=$_FILES['picture']['tmp_name'];
$destination=$approot.'upload/'.$target;

$is_file_moved=move_uploaded_file($target, $destination);

if ($is_file_moved){
}else{
    echo "Not ";
}
//echo $_firstname;
$_firstname = $_POST['firstname'];
$_lastname = $_POST['lastname'];
$_email_address = $_POST['email'];
$_gender = $_POST['gender'];
$_picture = $_POST['picture'];
$_password = $_POST['password'];

//Connect to Database
$conn = new PDO("mysql:host=localhost;dbname=online_exam", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//Insert Command
$query = "INSERT INTO `applicant` (`first_name`, `last_naem`, `email_address`, `gender`, `picture` , `password`) VALUES (:firstname, :lastname, :email_address, :gender, :picture ,:password)";

//Prepare a statement
$stmt = $conn->prepare($query);
//Bind
$stmt->bindParam(':firstname',$_firstname);
$stmt->bindParam(':lastname',$_lastname);
$stmt->bindParam(':email_address',$_email_address);
$stmt->bindParam(':gender',$_gender);
$stmt->bindParam(':picture',$_picture);
$stmt->bindParam(':password',$_password);
//Execution
$result=$stmt->execute();
//Message
if ($result){
    $_SESSION['message']= "student is added Successfully!";
}else{
    $_SESSION['message']= "Sorry, student is not added.";
}
//Redirect
header("location:index.php");