<?php

use Twig\Environment;
use Twig\Loader\ArrayLoader;
use Twig\Loader\FilesystemLoader;

require_once dirname(__DIR__).'/vendor/autoload.php';


$link = mysqli_connect('127.0.0.1:3306', 'root', '123', 'php_start'); 
$result = mysqli_query($link, "SELECT * FROM images ORDER BY countClick DESC");
while($rows[] = mysqli_fetch_assoc($result));
array_pop($rows);
$loader = new FilesystemLoader(dirname(__DIR__).'/templates');
$twig = new Environment($loader, [
    'cache' => dirname(__DIR__).'/cache'
]);
if (isset($_GET['img_id'])){
    $temp ='work2.html.twig';
    foreach ($rows as $key => $value) {
        if($value['id'] == $_GET['img_id']){
            $tempdate = ['rows' => $value];
        }        
    }
} else {
    $temp ='work.html.twig';
    $tempdate = ['rows' => $rows];
}

 echo $twig->render($temp, $tempdate);


