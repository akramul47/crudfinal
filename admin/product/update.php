<?php

//var_dump($_FILES);
session_start();
$approot = $_SERVER['DOCUMENT_ROOT'].'/CRUD/';
//working with file

if ($_FILES['picture']['name'] != ""){
    $filename = 'IMG_'.time().'_'.$_FILES['picture']['name'];
    $target = $_FILES['picture']['tmp_name'];
    $destination = $approot.'uploads/'.$filename;

    $isFileMoved = move_uploaded_file($target, $destination);

    if($isFileMoved){
        $_picture = $filename;
    }
    else{
        $_picture = null;
    }
}else{
    $_picture = $_POST['old_picture'];
}

$_id = $_POST['id'];
$_title = $_POST['title'];
$_modified_at = date('Y-m-d h:i:s', time());

if (array_key_exists('is_active', $_POST)){
    $_is_active = $_POST['is_active'];
}else{
    $_is_active = 0;
}
if (array_key_exists('is_deleted', $_POST)){
    $_is_deleted = $_POST['is_deleted'];
}else{
    $_is_deleted = 0;
}


$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Insert query
$query = "UPDATE `product` SET `title` = :title, `is_active` = :is_active, `is_deleted` = :is_deleted, `modified_at` = :modified_at, `picture` = :picture WHERE `product`.`id` = :id;";

$stmt = $conn->prepare($query);
$stmt->bindParam('id', $_id);
$stmt->bindParam('title', $_title);
$stmt->bindParam('is_active', $_is_active);
$stmt->bindParam('is_deleted', $_is_deleted);
$stmt->bindParam('modified_at', $_modified_at);
$stmt->bindParam('picture', $_picture);

$result = $stmt->execute();

if($result){
    $_SESSION['message'] = "product is updated successfully.";
}else{
    $_SESSION['message'] = "product is not updated";
}
header("location:index.php");
