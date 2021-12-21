
<?php
session_start();
$_name = $_POST['name'];
$_link = $_POST['link'];

if(array_key_exists('is_draft', $_POST)){
    $_is_draft = $_POST['is_draft'];
}else{
    $_is_draft = 0;
}


$_created_at = date('Y-m-d h:i:s', time());

echo "<pre>";
print_r($_name);
echo "</pre>";
//connect to database

$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = " INSERT INTO `categories` (`name`,`link`, `is_draft`, `created_at`) VALUES (:name, :link, :is_draft, :created_at);";

$stmt = $conn->prepare($query);
//$stmt->bindParam('title', $_title);
$result = $stmt->execute(array(
    ':name' => $_name,
    ':link' => $_link,
    ':is_draft' => $_is_draft,
    ':created_at' => $_created_at
));
if($result){
    $_SESSION['message'] = "category is added successfully.";
}else{
    $_SESSION['message'] = "category is not added";
}
//var_dump($result);
header("location:index.php");
?>