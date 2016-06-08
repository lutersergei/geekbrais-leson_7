<?php
include_once 'initial.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Image</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Comfortaa:400,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'></head>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-pull-1 col-sm-push-1">
            <div class="row ">
                <ul class="nav nav-tabs">
                    <li role="presentation"><a href="../index.php">Gallery</a></li>
                    <li role="presentation"  class="active"><a href="../add_image.php">Add Image </a></li>
                    <li role="presentation"><a href="../setting.php">Settings</a></li>
                </ul>
            </div>
        </div>
       
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-pull-1 col-sm-push-1">
            <h1>Загрузка файлов в галерею</h1>
            <p class="bg-danger">Максимальный размер файла <?php echo MAX_SIZE/1000000?>Mb !</p>
            <form class="form-inline" action="index.php" method="post" enctype="multipart/form-data">
                <div>
                    <input type="file" name="images" required>
                </div> <br>
                <div>
                    <label for="description">Добавьте описание</label>
                    <p><textarea rows="5" cols="45" id="description" name="description"></textarea></p>
                </div>
                <button type="submit" class="btn icon-btn btn-success"><span class="glyphicon btn-glyphicon glyphicon-ok img-circle text-success"></span> Add </button>
            </form>
            <h4><?php echo $result?></h4>
        </div>
    </div>
</div>
</body>
</html>
