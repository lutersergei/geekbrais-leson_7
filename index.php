<?php
session_start();
error_reporting(E_ALL);
define('MAX_SIZE', 5000000);
define('DANGER_NOT_IMAGE','Файл не является изображением');
define('ERROR','Произошла ошибка');
define('DANGER_SIZE_EXCEEDED','Превышен максимальный размер файла');
define('SUCCESS','Изображение успешно загружено');
$folder=false;
$result=false;
//Явно не лучший скрипт для создания превью. Но работает
include 'func_make_thumb.php';
include 'database_connection.php';
//Передача результата из сессии в переменную 
if (isset($_SESSION['result']))
{
    $result=$_SESSION['result'];
    unset($_SESSION['result']);
}
$query="SELECT * FROM `file_information` ORDER BY `file_information`.`views` DESC";
$data_result = mysqli_query($link,$query);
$files_array=array();
while($row = mysqli_fetch_assoc($data_result))
{
    $files_array[]=$row;
}
if ((isset($_FILES['images'])))
{   //Проверка типа загружаемого файла
    $type_array=getimagesize($_FILES['images']['tmp_name']);
    $file_path='img/'.$_FILES['images']['name'];
    $file_thumb_path='img_thumbnails/'.$_FILES['images']['name'];
    $file_name=$_FILES['images']['name'];
    $description=$_POST['description'];
    if (($type_array[2])===(1)||($type_array[2])===(2)||($type_array[2])===(3))
        {   //Проверка размера файла
            if (($_FILES['images']['size'])<MAX_SIZE)
            {
                if (($_FILES['images']['error'])===0)   //На проверку всех ошибок не хватило времени
                {
                    move_uploaded_file($_FILES['images']['tmp_name'],$file_path);
                    makeThumbnails($_SERVER['DOCUMENT_ROOT'].'/'.'img_thumbnails/',$file_path,$file_name);
                    $query=<<<SQL
INSERT INTO `file_information` (`id`, `upload_time`, `path_img`, `path_img_thumb`, `description`) VALUES (NULL, CURRENT_TIMESTAMP, '$file_path', '$file_thumb_path','$description');
SQL;

                    $result = mysqli_query($link,$query);
                    $_SESSION['result']=SUCCESS;
                    header("Location: index.php");
                    die();
                }
                else $_SESSION['result']=ERROR;
                header("Location: index.php");
                die();
            }
            else $_SESSION['result']=DANGER_SIZE_EXCEEDED;
            header("Location: index.php");
            die();
        }
    else $_SESSION['result']=DANGER_NOT_IMAGE;
    header("Location: index.php");
    die();
}
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
