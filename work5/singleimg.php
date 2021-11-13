<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">    
    <title>Document</title>
</head>
<?php
require_once 'db.php';
$imgID = $_GET['img_id'] ?? null;
if($imgID && is_numeric($imgID)){
    mysqli_query($link, 'update images set countClick = countClick + 1 where id='.$imgID);
    $thisImg = mysqli_query($link, 'select * from images where id='.$imgID);
    $fullImg = mysqli_fetch_assoc($thisImg);
    if ($fullImg) {
        echo ("<div class='item'>
                        <img class='Fitem' src=" . $fullImg["imgPath"] . " alt='img'>
                        <h2 class='text'>У этой картинки " . $fullImg["countClick"] . " просмотров</h2>
                    </div>");
    }
}?>


