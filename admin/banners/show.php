<?php
$webroot = "http://localhost/crud/";
$approot = $_SERVER['DOCUMENT_ROOT']. "/crud/";

include_once($approot. "vendor/autoload.php");

use Bitm\Banner;

$_banner = new Banner();

$banner = $_banner->show();
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
                    <dd class="col-md-9"><?=$banner['id']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Title:</dt>
                    <dd class="col-md-9"><?=$banner['title']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Link:</dt>
                    <dd class="col-md-9"><?=$banner['link']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Promotional Message:</dt>
                    <dd class="col-md-9"><?=$banner['promotional_message']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Html Banner:</dt>
                    <dd class="col-md-9"><?=$banner['html_banner']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Active:</dt>
                    <dd class="col-md-9">

                        <?php
                        echo $banner['is_active']? 'Active':'Deactive';
                        ?>

                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Is_draft:</dt>
                    <dd class="col-md-9">

                        <?php
                        echo $banner['is_draft']? 'Drafted':'not drafted';
                        ?>

                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Created_at:</dt>
                    <dd class="col-md-9"><?=$banner['created_at']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Modified_at:</dt>
                    <dd class="col-md-9"><?=$banner['modified_at']?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Picture:</dt>
                    <dd class="col-md-9">
                        <?=$banner['picture']?>
                        <img src="<?=$webroot?>uploads/<?=$banner['picture'];?>"
                             alt="<?=$banner['picture']?>">
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