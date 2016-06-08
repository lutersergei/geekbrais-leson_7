<?php
?>
<!doctype html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Comfortaa:400,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'></head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 info">
<!--            <p>Техническая информация</p>-->
<!--            --><?php
//            echo "Файлы в БД:<br>";
//            foreach ($images as $image) {
//                echo $image['id']." - ".$image['views']." - ".$image['path_img']."<br>";
//            }
//            ?>
        </div>
        <div class="col-md-6">
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
        <div class="col-md-3 info">
<!--            <p>Техническая информация</p>-->
<!--            --><?php
//            var_dump($_FILES);
//            var_dump($_SESSION);
//            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="button_upload">
                <a class="btn icon-btn btn-primary" href="../add_image.php"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-primary"></span> Add New Image</a>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
</body>
</html>