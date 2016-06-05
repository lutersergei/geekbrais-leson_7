<?php
error_reporting(E_ALL);
session_start();
include 'database_connection.php';
$result=NULL;
if (isset($_GET['id']))
{
    $id=$_GET['id'];
}
else {
    header('Location:index.php');
}
$query="SELECT * FROM `file_information` WHERE `id` = '$id'";
$data_result = mysqli_query($link,$query);
$information_array=array();
while($row = mysqli_fetch_assoc($data_result))
{
    $information_array[]=$row;
}
foreach ($information_array as $item)
{
    $id=$item['id'];
    $upload_time=$item['upload_time'];
    $description=$item['description'];
    $path_img=$item['path_img'];
    $views=++$item['views'];
}
$query=<<<SQL
UPDATE `file_information` SET `views` = '$views' WHERE `file_information`.`id` = '$id';
SQL;
$data_result = mysqli_query($link,$query);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Photo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400|Roboto+Mono:300' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 info"></div>
        <div class="col-md-6">
            <h1 class="title">Просмотр изображения</h1>
            <a class="thumbnail" href="<?=$path_img?>"><img src="<?=$path_img?>" alt="<?= $description?>"></a>
            <h4>Описание: <?= $description?></h4>
            <h4>Загружено: <?= $upload_time?></h4>
            <h4>Количество просмотров: <span class="badge"><?= $views?></span></h4>
        </div>
        <div class="col-md-3 info"></div>
    </div>
</div>
</body>
</html>



