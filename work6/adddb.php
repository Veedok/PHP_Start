<?php
require_once "index.php";
$link = mysqli_connect('127.0.0.1:3306', 'root', '123', 'php_start'); 
$dbtext = $_POST['loremtext'];
$inc = "INSERT ignore INTO reviews (textr, imgPath) VALUES ( '" . $dbtext . "', './img/1231245512.jpg')";
mysqli_query($link, $inc);
mysqli_close($link);