<?php
$webroot = "http://localhost/crud/";
$_id = $_GET['id'];

$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `carts` WHERE id = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

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
    <title>Edit</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h1 class="text-center">Edit</h1>
                <form method="post" action="update.php" enctype="multipart/form-data">

                    <div class="mb-3 row">
                        <label for="inputId" class="col-md-3 col-form-label"></label>
                        <div class="col-md-9">
                            <input
                                    type="hidden"
                                    class="form-control"
                                    id="inputId"
                                    name="id"
                                    value="<?=$cart['id'];?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputsid" class="col-md-3 col-form-label">S_id</label>
                        <div class="col-md-9">
                            <input
                                type="number"
                                class="form-control"
                                id="inputId"
                                name="sid"
                                value="<?=$cart['sid'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputProduct_id" class="col-md-3 col-form-label">Product_id:</label>
                        <div class="col-md-9">
                            <input
                                type="number"
                                class="form-control"
                                id="inputSid"
                                name="product_id"
                                value="<?=$cart['product_id'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputProduct_title" class="col-md-3 col-form-label">Product_title:</label>
                        <div class="col-md-9">
                            <input
                                type="text"
                                class="form-control"
                                id="inputProduct_id"
                                name="product_title"
                                value="<?=$cart['product_title'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputQty" class="col-md-3 col-form-label">Qty:</label>
                        <div class="col-md-9">
                            <input
                                type="number"
                                class="form-control"
                                id="inputQty"
                                name="qty"
                                value="<?=$cart['qty'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputUnit_price" class="col-md-3 col-form-label">Unit_price:</label>
                        <div class="col-md-9">
                            <input
                                type="number"
                                class="form-control"
                                id="inputUnit_price"
                                name="unit_price"
                                value="<?=$cart['unit_price'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputTotal_price" class="col-md-3 col-form-label">Total_price:</label>
                        <div class="col-md-9">
                            <input
                                    type="number"
                                    class="form-control"
                                    id="inputTotal_price"
                                    name="total_price"
                                    value="<?=$cart['total_price'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputTitle" class="col-md-3 col-form-label">Picture:</label>
                        <div class="col-md-9">
                            <input
                                    type="file"
                                    class="form-control"
                                    id="inputFile"
                                    name="picture"
                                    value="<?=$cart['picture'];?>">
                        </div>
                        <img src="<?=$webroot?>uploads/<?=$cart['picture'];?>" alt="<?=$cart['picture']?>">
                        <input type="hidden" name="old_picture" value="<?=$cart['picture'];?>">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </form>
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
