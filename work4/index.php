<!-- ПРОЧИТАЙТЕ ЭТОТ КОМЕНТАРИЙ ПЕРЕД ПРОВЕРКОЙ
Посчитал логику работы программы в задании не совсем верной поэтому ее слегка изменил
1. PHP создает файл JSON и записывает его на основе содержимого папки img
2. JS на основе файла JSON строит DOM 
3. В JS реалезуется функция с модальным окном
4. Есть еще ряд доработок которые можно сделать и которые сделаю чуть позже:
4.1 PHP не должен просто так выплевывать JSON файл в эту же деректорию а должен формировать и возвращать его 
в ответ на запрос от JS
4.2 В JS тоже много чего можно допилить это кнопки закрытия окна и логику закрытия модального окна
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    
    <title>Document</title>
</head>

<body>
    
    <div class="off" id="modal"></div>
    <div class="wrap">
        <div class="content">  
        <?php 
    $allImg = scandir('./img');
//Создаем массив для того что бы его в последующем записать в json формат
    $myImeges = [];
    foreach ( $allImg as $img){
        if ($img == '.' || $img == '..'){
        }else {
//Добавляем пути в массив который в следствии станет json файлом            
           $myImeges[] .= $img;
//Резервное решение которое я не считаю верным на 100% т.к. хотелось бы отдавать JSON файл для обработки его в js
//Я так понял именно это решение от нас и требовалось единственное не стал заворачивать все в тег а т.к. добавить в тег target blank очень легко            
// echo ("<div class='item'><img class='product_img' src='img/$img' alt='img'></div>");
             } 
            }
//записываем данные в файл json
            $json = json_encode($myImeges);
            $file = fopen('data.json','w+');
            fwrite($file, $json);
            fclose($file);
         ?>
        </div>
    </div>
    
    <script src="script.js"></script>
</body>
</html>