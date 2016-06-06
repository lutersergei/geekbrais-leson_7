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