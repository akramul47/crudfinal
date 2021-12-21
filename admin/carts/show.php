<?php
$webroot = "http://localhost/crud/";
$_id = $_GET['id'];

$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `carts` WHERE id = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam('id', $_id);

$result = $stmt->execute();

$cart = $stmt->fetch();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Show</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h1 class="text-center">Show</h1>

                <dl class="row">
                    <dt class="col-md-2">SID:</dt>
                    <dd class="col-md-10"><?=$cart['sid']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Product ID</dt>
                    <dd class="col-md-10"><?=$cart['product_id']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Product Title</dt>
                    <dd class="col-md-10"><?=$cart['product_title']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">QTY</dt>
                    <dd class="col-md-10"><?=$cart['qty']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Unit Price</dt>
                    <dd class="col-md-10"><?=$cart['unit_price']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Total Price</dt>
                    <dd class="col-md-10"><?=$cart['total_price']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Picture:</dt>
                    <dd class="col-md-10">
                        <?=$cart['picture']?>
                        <img src="<?=$webroot?>uploads/<?=$cart['picture'];?>"
                             alt="<?=$cart['picture']?>">
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>

