<?php
<<<<<<< 42869c3478cc59cdd1b39527ed28c7bec682ee33
<<<<<<< 42869c3478cc59cdd1b39527ed28c7bec682ee33
$link = mysqli_connect('127.0.0.1:3306', 'root', 'root', 'php_start');
$result = mysqli_query($link, "SELECT * FROM images ORDER BY countClick DESC");
var_dump($result);
while ($row = mysqli_fetch_assoc($result)){
    echo ("<a href='/singleimg.php?img_id=" . $row["id"] . "'>
                <div class='item'>
                    <img class='product_img' src=" . $row["imgPath"] . " alt='img'>
                    <p>" . $row["imgName"]  . "</p>
                </div>
            </a>");        
    }
=======

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
>>>>>>> ДЗ№3
=======
// $link = mysqli_connect('127.0.0.1:3306', 'root', 'root', 'php_start');
// $result = mysqli_query($link, "SELECT * FROM images ORDER BY countClick DESC");
// var_dump($result);
// while ($row = mysqli_fetch_assoc($result)){
//     echo ("<a href='/singleimg.php?img_id=" . $row["id"] . "'>
//                 <div class='item'>
//                     <img class='product_img' src=" . $row["imgPath"] . " alt='img'>
//                     <p>" . $row["imgName"]  . "</p>
//                 </div>
//             </a>");        
//     }
require_once dirname(__DIR__).'/vendor/autoload.php';

$loader = new \Twig\Loader\ArrayLoader([
    'index' => 'Hellow {{ name }}'
]);

$twig = new \Twig\Environment($loader);
echo $twig->render('index', ['name' => 'Anatoliy']); 
>>>>>>> 111
