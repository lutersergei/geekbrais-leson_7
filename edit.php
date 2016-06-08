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
if (isset($_SESSION['description']))
{
    $description=$_SESSION['description'];
}
if (isset($_POST['operation']))
{
    if ($_POST['operation']==='edit')
    {
        $text=$_POST['description'];
        change_description($id, $text);
        $_SESSION['add_view']='false';
        header("Location:photo.php?id={$id}");
    }
}
include 'views/edit.php';