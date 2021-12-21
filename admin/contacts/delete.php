<?php
session_start();
$_id = $_GET['id'];

//Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');

// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "DELETE FROM `contacts` WHERE `contacts`.`id` = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam(':id',$_id);
$result = $stmt->execute();

//var_dump($result);

if($result){
    $_SESSION['message'] = "contact is deleted successfully.";
}else{
    $_SESSION['message'] = "contact is not deleted";
}
//var_dump($result);

header("location:index.php");