<?php
session_start();
$_id = $_POST['id'];
$_name = $_POST['name'];
$_email = $_POST['email'];
echo "<pre>";
//print_r($_title);
echo "</pre>";
//connect to database

$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "UPDATE `contacts` SET `name` = :name, `email` = :email WHERE `contacts`.`id` = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam('name', $_name);
$stmt->bindParam('id', $_id);
$stmt->bindParam('email', $_email);
$result = $stmt->execute();

//var_dump($result);

if($result){
    $_SESSION['message'] = "Contact is updated successfully.";
}else{
    $_SESSION['message'] = "Contact is not updated";
}

header("location:index.php");