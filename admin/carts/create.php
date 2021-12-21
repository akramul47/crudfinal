<?php

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Create</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h1 class="text-center">Add to Cart</h1>
                <form method="post" action="store.php" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="inputId" class="col-md-3 col-form-label"></label>
                        <div class="col-md-9">
                            <input
                                type="hidden"
                                class="form-control"
                                id="inputId"
                                name="id"
                                value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputSid" class="col-md-3 col-form-label">S_id:</label>
                        <div class="col-md-9">
                            <input
                                type="number"
                                class="form-control"
                                id="inputSid"
                                name="sid"
                                value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputProduct_id" class="col-md-3 col-form-label">Product_id:</label>
                        <div class="col-md-9">
                            <input
                                type="number"
                                class="form-control"
                                id="inputProduct_id"
                                name="product_id"
                                value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputProduct_title" class="col-md-3 col-form-label">Product_title:</label>
                        <div class="col-md-9">
                            <input
                                type="text"
                                class="form-control"
                                id="inputProduct_title"
                                name="product_title"
                                value="">
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
                                value="">
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
                                value="">
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
                                    value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputFile" class="col-md-3 col-form-label">Picture:</label>
                        <div class="col-md-9">
                            <input
                                    type="file"
                                    class="form-control"
                                    id="inputFile"
                                    name="picture"
                                    value="">
                        </div>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>