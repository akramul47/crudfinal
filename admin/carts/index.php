<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `carts`";

$stmt = $conn->prepare($query);

$result = $stmt->execute();

$carts = $stmt->fetchAll();

echo "<pre>";
//print_r($banners);
echo "</pre>";
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>List</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h1 class="text-center">Category</h1>
                <div class="fs-2 text-success">
                    <?php
                    echo $_SESSION['message'];
                    $_SESSION['message'] = "";
                    ?>
                </div>
                <ul class="nav justify-content-center fs-3">
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Add an item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Sid</th>
                        <th scope="col">Product Id</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($carts)>0):
                        foreach ($carts as $cart):
                            ?>
                            <tr>
                                <td><?= $cart['sid'];?></td>
                                <td><?= $cart['product_id'];?></td>
                                <td><?= $cart['product_title'];?></td>
                                <td><?= $cart['qty'];?></td>
                                <td><?= $cart['unit_price'];?></td>
                                <td><?= $cart['total_price'];?></td>
                                <td><td><a href="show.php?id=<?=$cart['id'];?>">Show</a> |<a href="edit.php?id=<?=$cart['id'];?>">Edit</a>  | <a href="delete.php?id=<?=$cart['id'];?>" onclick="return confirm('are you sure you want to delete?')">Delete</a></td></td>
                            </tr>
                        <?php
                        endforeach;
                    else:
                        ?>
                        <tr>
                            <td colspan="2">No Product is available.<a href="create.php">Click here to add one.</a></td>
                        </tr>
                    <?php
                    endif;
                    ?>
                    </tbody>
                </table>
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

