<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
require_once dirname(__DIR__).'/vendor/autoload.php';
//Решил не выносить подключение к БД т.к. вся логика реализуется мение чем на 30 строчках
$link = mysqli_connect('127.0.0.1:3306', 'root', '123', 'php_start'); 
$result = mysqli_query($link, "SELECT * FROM images ORDER BY countClick DESC");
while($rows[] = mysqli_fetch_assoc($result));
array_pop($rows);
// Подключаем twig и загрузчик деректории.Так же не забываем папку cache закинуть в gitignore
$loader = new FilesystemLoader(dirname(__DIR__).'/templates');
$twig = new Environment($loader, [
    'cache' => dirname(__DIR__).'/cache'
]);
//Проверка на передачу GET параметров если они есть проверяем совпадение ID с одним из массивов в масиве из БД
if (isset($_GET['img_id'])){
    $temp ='work2.html.twig';
    foreach ($rows as $key => $value) {
        if($value['id'] == $_GET['img_id']){
            $tempdate = ['rows' => $value];
        }        
    }
// Если GET параметров нет то отдаем весь массив с массивами не рендеринг одному из шаблонов
} else {
    $temp ='work.html.twig';
    $tempdate = ['rows' => $rows];
}

 echo $twig->render($temp, $tempdate);


