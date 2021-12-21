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

$query = "DELETE FROM `product` WHERE `product`.`id` = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam(':id',$_id);
$result = $stmt->execute();

if($result){
    $_SESSION['message'] = "product is deleted successfully.";
}else{
    $_SESSION['message'] = "product is not deleted";
}
//var_dump($result);

header("location:trash_index.php");