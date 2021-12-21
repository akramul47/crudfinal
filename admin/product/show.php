<?php
$webroot = "http://localhost/crud/";
//$approot = $_SERVER['DOCUMENT_ROOT'].'/CRUD/';
$_id = $_GET['id'];

$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `product` WHERE id = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam('id', $_id);

$result = $stmt->execute();

$product = $stmt->fetch();
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
                    <dt class="col-md-3">ID:</dt>
                    <dd class="col-md-9"><?=$product['id']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Title:</dt>
                    <dd class="col-md-9"><?=$product['title']?></dd>
                </dl>

                <dl class="row">
                    <dt class="col-md-3">Active:</dt>
                    <dd class="col-md-9">

                        <?php
                        echo $product['is_active']? 'Active':'Deactive';
                        ?>

                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Deleted:</dt>
                    <dd class="col-md-9">

                        <?php
                        echo $product['is_deleted']? 'Deleted':'Not deleted';
                        ?>

                    </dd>
                </dl>

                <dl class="row">
                    <dt class="col-md-3">Created_at:</dt>
                    <dd class="col-md-9"><?=$product['created_at']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Modified_at:</dt>
                    <dd class="col-md-9"><?=$product['modified_at']?></dd>
                </dl>

                <dl class="row">
                    <dt class="col-md-3">Picture:</dt>
                    <dd class="col-md-9">
                        <?=$product['picture'];?>
                        <img src="<?=$webroot?>uploads/<?=$product['picture'];?>" alt="<?=$product['picture']?>">
                    </dd>
                </dl>
                <dl class="row">
                    <dd class="col-md-9">
                       Go to <a href="index.php">List items</a>
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
