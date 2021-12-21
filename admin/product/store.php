<?php
session_start();

//echo $_SERVER['DOCUMENT_ROOT'].'/CRUD/';

$approot = $_SERVER['DOCUMENT_ROOT'].'/CRUD/';
//working with file
$filename = 'IMG_'.time().'_'.$_FILES['picture']['name'];
$target = $_FILES['picture']['tmp_name'];
$destination = $approot.'uploads/' .$filename;

$isFileMoved = move_uploaded_file($target, $destination);

if($isFileMoved){
    $_picture = $filename;
}
else{
    $_picture = null;
}
$_title = $_POST['title'];

if(array_key_exists('is_active', $_POST)){
    $_is_active = $_POST['is_active'];
}else{
    $_is_active = 0;
}

if(array_key_exists('is_deleted', $_POST)){
    $_is_deleted = $_POST['is_deleted'];
}else{
    $_is_deleted = 0;
}

$_created_at = date('Y-m-d h:i:s', time());
echo "<pre>";
//print_r($_title);
print_r($_FILES);
echo "</pre>";
//connect to database
//die();
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "INSERT INTO `product` (`title`, `is_active`, `is_deleted`, `created_at`, `picture`) VALUES (:title, :is_active, :is_deleted,  :created_at, :picture);";

$stmt = $conn->prepare($query);
$stmt->bindParam('title', $_title);
$stmt->bindParam('is_active', $_is_active);
$stmt->bindParam('is_deleted', $_is_deleted);
$stmt->bindParam('created_at', $_created_at);
$stmt->bindParam('picture', $_picture);
$result = $stmt->execute();

//var_dump($result);
if($result){
    $_SESSION['message'] = "product is added successfully.";
}else{
    $_SESSION['message'] = "product is not added";
}
header("location:index.php");