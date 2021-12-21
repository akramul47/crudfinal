<?php

session_start();

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

if(array_key_exists('is_active', $_POST)){
    $_is_active = $_POST['is_active'];
}else{
    $_is_active = 0;
}

if(array_key_exists('is_draft', $_POST)){
    $_is_draft = $_POST['is_draft'];
}else{
    $_is_draft = 0;
}



$_title = $_POST['title'];
$_link = $_POST['link'];
$_promotional_message = $_POST['promotional_message'];
$_html_banner = $_POST['html_banner'];
$_created_at = date('Y-m-d h:i:s', time());

echo "<pre>";
print_r($_title);
echo "</pre>";
//connect to database

$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = " INSERT INTO `banner` (`title`,`link`, `promotional_message`, `html_banner`, `is_active`, `is_draft`, `picture`, `created_at`) VALUES (:title, :link, :promotional_message, :html_banner, :is_active, :is_draft, :picture, :created_at);";

$stmt = $conn->prepare($query);
//$stmt->bindParam('title', $_title);
$result = $stmt->execute(array(
    ':title' => $_title,
    ':link' => $_link,
    ':promotional_message' => $_promotional_message,
    ':html_banner' => $_html_banner,
    ':is_active' => $_is_active,
    ':is_draft' => $_is_draft,
    ':picture' => $_picture,
    ':created_at' => $_created_at
));
if($result){
    $_SESSION['message'] = "banner is added successfully.";
}else{
    $_SESSION['message'] = "banner is not added";
}
//var_dump($result);
header("location:index.php");
?>