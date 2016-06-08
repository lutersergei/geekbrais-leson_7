<?php
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Setting</title>
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
                    <li role="presentation" ><a href="../add_image.php">Add Image </a></li>
                    <li role="presentation" class="active"><a href="../setting.php">Settings</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3 info"></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Reset database and clean folders</h1>
            <form action="" method="post">
                <input type="hidden" name="action" value="reset">
                <button class="btn icon-btn btn-danger" href="#"><span class="glyphicon btn-glyphicon glyphicon-trash img-circle text-danger"></span>Delete</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
</body>
</html>
