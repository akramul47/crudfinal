<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `categories`";

$stmt = $conn->prepare($query);

$result = $stmt->execute();

$categories = $stmt->fetchAll();

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
                        <th scope="col">Name</th>
                        <th scope="col">Link</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($categories)>0):
                        foreach ($categories as $category):
                            ?>
                            <tr>
                                <td><?= $category['name'];?></td>
                                <td><?= $category['link'];?></td>
                                <td><td><a href="show.php?id=<?=$category['id'];?>">Show</a> |<a href="edit.php?id=<?=$category['id'];?>">Edit</a>  | <a href="delete.php?id=<?=$category['id'];?>" onclick="return confirm('are you sure you want to delete?')">Delete</a></td></td>
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

