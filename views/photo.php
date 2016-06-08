<?php
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Photo</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Comfortaa:400,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'></head>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 info"></div>
        <div class="col-md-6">
            <div class="row ">
                <ul class="nav nav-tabs">
                    <li role="presentation"><a href="../index.php">Gallery</a></li>
                    <li role="presentation"><a href="../add_image.php">Add Image </a></li>
                    <li role="presentation"><a href="../setting.php">Settings</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3 info"></div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 info"></div>
        <div class="col-md-6">
            <h1 class="title">Просмотр изображения</h1>
            <a class="thumbnail" href="<?=$path_img?>"><img src="<?=$path_img?>" alt="<?= $description?>"></a>
            <h4>Описание: <?= $description?></h4>
            <h4>Загружено: <?= $upload_time?></h4>
            <h4>Количество просмотров: <span class="badge"><?= $views?></span></h4>
            <form action="" method="post">
                <button type="submit" class="btn icon-btn btn-warning" value="remove" name="operation"><span class="glyphicon btn-glyphicon glyphicon-minus img-circle text-warning"></span>Remove</button>
                <button class="btn icon-btn btn-success" value="edit" name="operation"><span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-success"></span>Edit</button>
            </form>
        </div>
        <div class="col-md-3 info">
<!--            --><?php
//            var_dump($_SESSION);
//            ?>
        </div>
    </div>
</div>
</body>
</html>