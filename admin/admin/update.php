<?php
session_start();
$_id = $_POST['id'];
$_name = $_POST['name'];
$_email = $_POST['email'];
$_password = $_POST['password'];
$_phone = $_POST['phone'];
if(array_key_exists('is_draft', $_POST)){
    $_is_draft = $_POST['is_draft'];
}else{
    $_is_draft = 0;
}
$_modified_at = date('Y-m-d h:i:s', time());
echo "<pre>";
//print_r($_title);
echo "</pre>";
//connect to database

$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "UPDATE `admins` SET `name` = :name, `email` = :email, `password` = :password, `is_draft` = :is_draft, `modified_at` = :modified_at, `phone` = :phone WHERE `admins`.`id` = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam('id', $_id);
$stmt->bindParam('name', $_name);
$stmt->bindParam('email', $_email);
$stmt->bindParam('password', $_password);
$stmt->bindParam('is_draft', $_is_draft);
$stmt->bindParam('modified_at', $_modified_at);
$stmt->bindParam('phone', $_phone);

$result = $stmt->execute();

//var_dump($result);

if($result){
    $_SESSION['message'] = "Admin is updated successfully.";
}else{
    $_SESSION['message'] = "Admin is not updated";
}

header("location:index.php");