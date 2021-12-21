
<?php
session_start();
$_name = $_POST['name'];
$_email = $_POST['email'];
$_password = $_POST['password'];
$_phone = $_POST['phone'];

if(array_key_exists('is_draft', $_POST)){
    $_is_draft = $_POST['is_draft'];
}else{
    $_is_draft = 0;
}

$_created_at = date('Y-m-d h:i:s', time());
//$_date1 = $_POST['date1'];

echo "<pre>";
print_r($_name);
echo "</pre>";
//connect to database

$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = " INSERT INTO `admins` (`name`,`email`,`password`, `phone`, `is_draft`, `created_at`) VALUES (:name, :email, :password, :phone, :is_draft, :created_at);";

$stmt = $conn->prepare($query);
//$stmt->bindParam('title', $_title);
$result = $stmt->execute(array(
    ':name' => $_name,
    ':email' => $_email,
    ':password' => $_password,
    ':phone' => $_phone,
    ':is_draft' => $_is_draft,
    ':created_at' => $_created_at
));
if($result){
    $_SESSION['message'] = "admin is added successfully.";
}else{
    $_SESSION['message'] = "admin is not added";
}
//var_dump($result);
header("location:index.php");
?>