<?php
session_start();
$_name = $_POST['name'];
$_email = $_POST['email'];
$_subject = $_POST['subject'];
$_comment = $_POST['comment'];
$_created_at = date('Y-m-d h:i:s', time());

echo "<pre>";
//print_r($_name);
echo "</pre>";
//connect to database

$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = " INSERT INTO `contacts` (`name`,`email`, `subject`, `comment`, `created_at`) VALUES (:name, :email, :subject, :comment, :created_at);";

$stmt = $conn->prepare($query);
$result = $stmt->execute(array(
    ':name' => $_name,
    ':email' => $_email,
    ':subject' => $_subject,
    ':comment' => $_comment,
    ':created_at' => $_created_at
));
if($result){
    $_SESSION['message'] = "contacts is added successfully.";
}else{
    $_SESSION['message'] = "contacts is not added";
}
//var_dump($result);
header("location:index.php");
?>

