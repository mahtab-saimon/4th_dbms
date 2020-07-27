
<?php

$hostname='localhost';
$username='root';
$password='';
$pdo = new PDO("mysql:host=$hostname;dbname=online_exam",$username,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>