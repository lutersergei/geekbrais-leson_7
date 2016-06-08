<?php
include_once 'initial.php';
include_once 'models/files_and_database.php';
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
        $path_img_thumb=$item['path_img_thumb'];
        if ($_SESSION['add_view']==='true')
        {
            $views=++$item['views'];
        }
        else
        {
            $views=$item['views'];
        }
    }
    update_numbers_of_views($id, $views);
}
else {
    die("Неверный параметр"); //404
}
$_SESSION['add_view']='false';
if (isset($_POST['operation']))
{
    if ($_POST['operation']==='remove')
    {
        if (delete_by_id($id,$path_img,$path_img_thumb))
        {
            $_SESSION['operator']='remove';
            header('Location:index.php');
            die();
        }
        else die("ERROR");

    }
    if ($_POST['operation']==='edit')
    {
        $_SESSION['description']=$description;
        header("Location:edit.php?id={$id}");
        die();
    }
}
mysqli_close($link);
include 'views/photo.php';