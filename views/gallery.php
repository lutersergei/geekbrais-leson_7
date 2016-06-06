<?php
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400|Roboto+Mono:300' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 info">
            <p>Техническая информация</p>
            <?php
            echo "Файлы в БД:<br>";
            foreach ($files_array as $file) {
                echo $file['id']." - ".$file['views']." - ".$file['path_img']."<br>";
            }
            ?>
        </div>
        <div class="col-md-6">
            <div class="row ">
                <h1 class="title">Image_Gallery (Beta Version)</h1>
                <?php foreach ($files_array as $files)
                {
                    echo <<<HTML
               <div class="thumbnail_new">
                    <a class="thumbnail" href="photo.php?id={$files['id']}" target="_blank">
                        <img class="imgage-thumbnail" src="{$files['path_img_thumb']}" alt="...">
                     </a> 
                     <p>Просмотры: <span class="badge">{$files['views']}</span></p>
               </div>
HTML;
                }?>
            </div>
        </div>
        <div class="col-md-3 info">
            <p>Техническая информация</p>
            <?php
            var_dump($_FILES);
            var_dump($_SESSION);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2>Загрузка файлов в галерею</h2>
            <h4>Максимальный размер файла <?php echo MAX_SIZE/1000000?>Mb</h4>
            <form class="form-inline" action="" method="post" enctype="multipart/form-data">
                <div>
                    <input type="file" name="images">
                </div> <br>
                <div>
                    <label for="description">Добавьте описание</label>
                    <p><textarea rows="5" cols="45" id="description" name="description"></textarea></p>
                </div>
                <button type="submit" class="btn btn-success">Загрузить</button>
            </form>
            <h4><?php echo $result?></h4>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
</body>
</html>
