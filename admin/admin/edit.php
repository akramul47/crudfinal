<?php

$_id = $_GET['id'];

$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `admins` WHERE id = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

$admin = $stmt->fetch();
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
                                value="<?=$admin['id'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputName" class="col-md-3 col-form-label">Name:</label>
                        <div class="col-md-9">
                            <input
                                type="text"
                                class="form-control"
                                id="inputName"
                                name="name"
                                value="<?=$admin['name'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputEmail" class="col-md-3 col-form-label">Email:</label>
                        <div class="col-md-9">
                            <input
                                type="text"
                                class="form-control"
                                id="inputEmail"
                                name="email"
                                value="<?=$admin['email'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-md-3 col-form-label">Password:</label>
                        <div class="col-md-9">
                            <input
                                type="password"
                                class="form-control"
                                id="inputPassword"
                                name="password"
                                value="<?=$admin['password'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPhone" class="col-md-3 col-form-label">Phone:</label>
                        <div class="col-md-9">
                            <input
                                type="number"
                                class="form-control"
                                id="inputPhone"
                                name="phone"
                                value="<?=$admin['phone'];?>">
                        </div>
                    </div>

                    <div class="mb-3 row form-check">
                        <div class="col-md-9">

                            <?php
                            if ($admin['is_draft'] == 0){
                                ?>
                                <input
                                        type="checkbox"
                                        class="form-check-input"
                                        id="inputIs_draft"
                                        name="is_draft"
                                        value="1">

                                <?php
                            }else{
                                ?>

                                <input
                                        type="checkbox"
                                        class="form-check-input"
                                        id="inputIs_draft"
                                        name="is_draft"
                                        value="1"
                                        checked>
                                <?php
                            }
                            ?>


                        </div>
                        <label for="inputIs_draft" class="mb-3 form-check-label">Is draft</label>
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