<?php
// Подключение к самой БД
$link = mysqli_connect('127.0.0.1:3306', 'root', 'root', 'php_start'); 
// Запрос с использованием Get Параметров
$result = mysqli_query($link, "SELECT * FROM php_start.images WHERE id >=".$_GET['myid']." ORDER BY id LIMIT 2");
// Из результата запроса делаем массив и кодируем его в JSON
while($rows[] = mysqli_fetch_assoc($result));
array_pop($rows);
$work4 = json_encode($rows);
// С помощью echo отдаем его JS
echo($work4);
// Закрываем соединение с БД
mysqli_close($link);


// По итогу задание не оч сложное но есть моменты которые не легко понять это как передавать данные между фронтом и бэком. Долго провозился с передачей данных между JS и PHP