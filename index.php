<?php 
    $title = 'Здесь должен быть title';
    $h1 = 'Здесь должен быть h1';
    $year = date("Y");

   echo "<!DOCTYPE html>
   <html lang='ru'>
   <head>
       <meta charset='UTF-8'>
       <meta http-equiv='X-UA-Compatible' content='IE=edge'>
       <meta name='viewport' content='width=device-width, initial-scale=1.0'>
       <title>$title</title>
   </head>
   <body>
        <h1>$h1</h1>
        <h2>Сейчас $year год</h2>
        <a href='Task1.jpg' target='_blank'>Урок 1</a>
        <a href='work2/work2.php' target='_blank'>Урок 2</a>
        <a href='work3/work3.php' target='_blank'>Урок 3</a>
        <a href='task3.php' target='_blank'>Задание 3</a>
        <a href='task5.php' target='_blank'>Задание 5</a>
   </body>
   </html>";