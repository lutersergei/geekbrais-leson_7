<?php
session_start();
error_reporting(E_ALL);
mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');
define('MAX_SIZE', 5000000);
define('DANGER_NOT_IMAGE','Файл не является изображением');
define('ERROR','Произошла ошибка');
define('DANGER_SIZE_EXCEEDED','Превышен максимальный размер файла');
define('SUCCESS','Изображение успешно загружено');
define('UPLOAD_IMAGES_FOLDER','img/');
define('THUMBNAILS_FOLDER','img_thumbnails/');
$alphabet=['а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'jo','ж'=>'zh','з'=>'z','и'=>'i','й'=>'j',
    'к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u',' '=>'_','ф'=>'f',
    'х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shh','ъ'=>"'",'ы'=>'y','ь'=>"'",'э'=>'je','ю'=>'yu','я'=>'ya','q'=>'q',
    'w'=>'w', 'e'=>'e', 'r'=>'r', 't'=>'t', 'y'=>'y', 'u'=>'u', 'i'=>'i', 'o'=>'o', 'p'=>'p', 'a'=>'a', 's'=>'s','d'=>'d','f'=>'f',
    'g'=>'g', 'h'=>'h', 'j'=>'j', 'k'=>'k', 'l'=>'l', 'z'=>'z', 'x'=>'x', 'c'=>'c', 'v'=>'v', 'b'=>'b', 'n'=>'n','m'=>'m',
    '.'=>'.', '-'=>'_', '0'=>'0','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9', '_'=>'_'];
$folder=false;
$result=false;