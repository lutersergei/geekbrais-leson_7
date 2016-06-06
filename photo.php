<?php
include_once 'settings.php';
include_once 'models/images.php';
include_once 'models/database_connection.php';
if (isset($_GET['id']))
{
    $id=$_GET['id'];
}
else {
    header('Location:index.php');
}
if ($image_information=get_image_information($id))
{
    foreach ($image_information as $item)
    {
        $id=$item['id'];
        $upload_time=$item['upload_time'];
        $description=$item['description'];
        $path_img=$item['path_img'];
        $views=++$item['views'];
    }
    update_numbers_of_views($id, $views);
}
else {
    die("Неверный параметр"); //404
}
mysqli_close($link);
include 'views/photo.php';


