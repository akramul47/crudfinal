<?php
session_start();
$_id = $_GET['id'];
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "DELETE FROM `banner` WHERE `banner`.`id` = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam(':id',$_id);
$result = $stmt->execute();
if($result){
    $_SESSION['message'] = "Banner is deleted successfully.";
}else{
    $_SESSION['message'] = "Banner is not deleted";
}
//var_dump($result);
header("location:index.php");
