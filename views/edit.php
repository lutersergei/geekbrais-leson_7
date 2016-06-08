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
            <form class="form-inline" method="post">
                <div>
                    <label class="bg-success" for="description">Изменить описание</label>
                    <p><textarea rows="5" cols="45" id="description" name="description"><?= $description ?></textarea></p>
                    <button class="btn icon-btn btn-success" value="edit" name="operation"><span class="glyphicon btn-glyphicon glyphicon-edit img-circle text-success"></span>Edit</button>
                </div>
            </form>
        </div>
        <div class="col-md-3 info"></div>
    </div>
</div>
</body>
</html>