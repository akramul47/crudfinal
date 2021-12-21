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

$_sid = $_POST['sid'];
$_product_id = $_POST['product_id'];
$_product_title = $_POST['product_title'];
$_qty = $_POST['qty'];
$_unit_price = $_POST['unit_price'];
$_total_price = $_POST['total_price'];

//connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "INSERT INTO `carts` (`sid`, `product_id`, `product_title`, `qty`, `unit_price`, `total_price`, `picture`) VALUES ( :sid, :product_id, :product_title, :qty, :unit_price, :total_price, :picture);";

$stmt = $conn->prepare($query);
//$stmt->bindParam('title', $_title);
$result = $stmt->execute(array(
    ':sid' => $_sid,
    ':product_id' => $_product_id,
    ':product_title' => $_product_title,
    ':qty' => $_qty,
    ':unit_price' => $_unit_price,
    ':total_price' => $_total_price,
    ':picture' => $_picture
));
if($result){
    $_SESSION['message'] = "Cart is added successfully.";
}else{
    $_SESSION['message'] = "Cart is not added";
}
//var_dump($result);
//header("location:index.php");
header("location:index.php");
?>