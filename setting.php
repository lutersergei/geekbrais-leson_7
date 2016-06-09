<?php
include_once 'initial.php';
include_once 'models/database_connection.php';
include_once 'models/files_and_database.php';
if (isset($_POST['action']))
{
    if ($_POST['action'] === 'reset')
    {
        reset_database();
        header('Location:index.php');
        die();
    }
}
include 'views/setting.php';