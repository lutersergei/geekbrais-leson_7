<?php
?>
<!doctype html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gallery</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Comfortaa:400,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'></head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-pull-1 col-sm-push-1">
            <div class="row ">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#">Gallery</a></li>
                    <li role="presentation" ><a href="../add_image.php">Add Image </a></li>
                    <li role="presentation" ><a href="../setting.php">Settings</a></li>
                </ul>
                <h1 class="title">Image Gallery</h1>
                <?php foreach ($images as $image)
                {
                    echo <<<HTML
               <div class="thumbnail_new">
                    <a class="thumbnail" href="../photo.php?id={$image['id']}">
                        <img class="imgage-thumbnail" src="{$image['path_img_thumb']}" alt="...">
                     </a> 
                     <p>Просмотры: <span class="badge">{$image['views']}</span></p>
               </div>
HTML;
                }?>
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-push-4 col-sm-pull-4">
            <div class="button_upload">
                <a class="btn icon-btn btn-primary" href="../add_image.php"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-primary"></span> Add New Image</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>