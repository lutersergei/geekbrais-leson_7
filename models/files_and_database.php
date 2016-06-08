<?php
function get_all_images_by_views ()
{
    global $link;
    $query="SELECT * FROM `file_information` ORDER BY `file_information`.`views` DESC";
    $data_result = mysqli_query($link,$query);
    $images=array();
    while($row = mysqli_fetch_assoc($data_result))
    {
        $images[]=$row;
    }
    return $images;
}
function get_image_information ($id)
{
    global $link;
    $query="SELECT * FROM `file_information` WHERE `id` = '$id'";
    $data_result = mysqli_query($link,$query);
    $image_information=array();
    while($row = mysqli_fetch_assoc($data_result))
    {
        $image_information[]=$row;
    }
    if ($image_information)
    {
        return $image_information;
    }
    else return false;
}
function update_numbers_of_views($id, $views)
{
    global $link;
    $query=<<<SQL
UPDATE `file_information` SET `views` = '$views' WHERE `file_information`.`id` = '$id';
SQL;
    $data_result = mysqli_query($link,$query);
    if ($data_result) return true;
    else return false;
}
function add_new_image ($file_path, $file_thumb_path, $description)
{
    global $link;
    $query=<<<SQL
INSERT INTO `file_information` (`id`, `upload_time`, `path_img`, `path_img_thumb`, `description`) VALUES (NULL, CURRENT_TIMESTAMP, '$file_path', '$file_thumb_path','$description');
SQL;
    mysqli_query($link,$query);
}
function reset_database()
{
    global $link;
    $query="DELETE FROM `file_information` WHERE 1";
    mysqli_query($link,$query);
    $folder=opendir(UPLOAD_IMAGES_FOLDER);
    while ($file = readdir($folder))
    {
        if (($file == ".") || ($file == "..")) continue;
        $files_array[] = $file;
    }
    foreach ($files_array as $item)
    {
        unlink(UPLOAD_IMAGES_FOLDER.'/'.$item);
    }
    $folder=opendir(THUMBNAILS_FOLDER);
    while ($file = readdir($folder))
    {
        if (($file == ".") || ($file == "..")) continue;
        $files_array[] = $file;
    }
    foreach ($files_array as $item)
    {
        unlink(THUMBNAILS_FOLDER.'/'.$item);
    }
    closedir($folder);
}
function delete_by_id ($id,$path_img,$path_img_thumb)
{
    global $link;
    $query="DELETE FROM `file_information` WHERE `id` = '$id'";
    mysqli_query($link,$query);
    if ((unlink($path_img))&&(unlink($path_img_thumb)))
    {
        return true;
    }
}
function change_description ($id, $text)
{
    global $link;
    $query="UPDATE `file_information` SET `description` = '$text' WHERE `file_information`.`id` = '$id'";
    mysqli_query($link,$query);
}
