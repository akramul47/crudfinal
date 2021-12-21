<?php
session_start();
$_id = $_POST['id'];
$_name = $_POST['name'];
$_link = $_POST['link'];

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

$query = "UPDATE `categories` SET `name` = :name, `link` = :link, `is_draft` = :is_draft, `modified_at` = :modified_at WHERE `categories`.`id` = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam('name', $_name);
$stmt->bindParam('id', $_id);
$stmt->bindParam('link', $_link);
$stmt->bindParam('is_draft', $_is_draft);
$stmt->bindParam('modified_at', $_modified_at);
$result = $stmt->execute();

//var_dump($result);

if($result){
    $_SESSION['message'] = "category is updated successfully.";
}else{
    $_SESSION['message'] = "category is not updated";
}

header("location:index.php");