<?php
session_start();
error_reporting(E_ALL);
define('MAX_SIZE', 5000000);
define('DANGER_NOT_IMAGE','Файл не является изображением');
define('ERROR','Произошла ошибка');
define('DANGER_SIZE_EXCEEDED','Превышен максимальный размер файла');
define('SUCCESS','Изображение успешно загружено');
define('UPLOAD_IMAGES_FOLDER','img/');
define('THUMBNAILS_FOLDER','img_thumbnails/');
$folder=false;
$result=false;