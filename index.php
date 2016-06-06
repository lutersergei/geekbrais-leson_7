<?php
include_once 'settings.php';
include_once 'models/images.php';
include_once 'models/func_make_thumb.php';
include_once 'models/database_connection.php';

//Передача результата из сессии в переменную 
if (isset($_SESSION['result']))
{
    $result=$_SESSION['result'];
    unset($_SESSION['result']);
}
if ((isset($_FILES['images'])))
{   //Проверка типа загружаемого файла
    $type_array=getimagesize($_FILES['images']['tmp_name']);
    $file_path='img/'.$_FILES['images']['name'];
    $file_thumb_path='img_thumbnails/'.$_FILES['images']['name'];
    $file_name=$_FILES['images']['name'];
    $file_temp_name=$_FILES['images']['tmp_name'];
    $description=$_POST['description'];
    if (($type_array[2])===(1)||($type_array[2])===(2)||($type_array[2])===(3))
        {   //Проверка размера файла
            if (($_FILES['images']['size'])<MAX_SIZE)
            {
                if (($_FILES['images']['error'])===0)
                {
                    move_uploaded_file($file_temp_name,$file_path);
                    makeThumbnails($_SERVER['DOCUMENT_ROOT'].'/'.'img_thumbnails/',$file_path,$file_name);
                    add_new_image ($file_path, $file_thumb_path, $description);
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
$images=get_all_images_by_views();
mysqli_close($link);
include 'views/gallery.php';

