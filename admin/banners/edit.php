<?php
$webroot = "http://localhost/crud/";
$_id = $_GET['id'];

$conn = new PDO("mysql:host=localhost;dbname=ecommerce", 'root', '');
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `banner` WHERE id = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

$banner = $stmt->fetch();
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
                                value="<?=$banner['id'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputTitle" class="col-md-3 col-form-label">Title:</label>
                        <div class="col-md-9">
                            <input
                                type="text"
                                class="form-control"
                                id="inputTitle"
                                name="title"
                                value="<?=$banner['title'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputTitle" class="col-md-3 col-form-label">Link:</label>
                        <div class="col-md-9">
                            <input
                                type="text"
                                class="form-control"
                                id="inputLink"
                                name="link"
                                value="<?=$banner['link'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPromotional_message" class="col-md-3 col-form-label">Promotional Message</label>
                        <div class="col-md-9">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="inputPromotional_message"
                                    name="promotional_message"
                                    value="<?=$banner['promotional_message'];?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputHtml_banner" class="col-md-3 col-form-label">Html banner</label>
                        <div class="col-md-9">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="inputHtml_banner"
                                    name="html_banner"
                                    value="<?=$banner['html_banner'];?>">
                        </div>
                    </div>

                    <div class="mb-3 row form-check">
                        <div class="col-md-9">

                            <?php
                            if ($banner['is_active'] == 0){
                                ?>
                                <input
                                        type="checkbox"
                                        class="form-check-input"
                                        id="inputIs_active"
                                        name="is_active"
                                        value="1">

                                <?php
                            }else{
                                ?>

                                <input
                                        type="checkbox"
                                        class="form-check-input"
                                        id="inputIs_active"
                                        name="is_active"
                                        value="1"
                                        checked>
                                <?php
                            }
                            ?>


                        </div>
                        <label for="inputIs_active" class="mb-3 form-check-label">Is active</label>
                    </div>

                    <div class="mb-3 row form-check">
                        <div class="col-md-9">

                            <?php
                            if ($banner['is_draft'] == 0){
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

                    <div class="mb-3 row">
                        <label for="inputTitle" class="col-md-3 col-form-label">Picture:</label>
                        <div class="col-md-9">
                            <input
                                    type="file"
                                    class="form-control"
                                    id="inputFile"
                                    name="picture"
                                    value="<?=$banner['picture'];?>">
                        </div>
                        <img src="<?=$webroot?>uploads/<?=$banner['picture'];?>" alt="<?=$banner['picture']?>">
                        <input type="hidden" name="old_picture" value="<?=$banner['picture'];?>">
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
