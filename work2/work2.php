<?php
/*1)Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;*/

//Тут обычное ветвление в зависимости от переданных значений
function qwest1 ($a,$b) {
    if ($a >= 0 && $b >= 0) {
        return ($a - $b);
    }else if ($a < 0 && $b < 0) {
        return ($a * $b);
    }else {
        return ($a + $b);
    } };
$qwest1def = qwest1(5,3);
$qwest1prod = qwest1(-2,-5);
$qwest1sum = qwest1(7,-3);

/*2)Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.*/
// Я даже затрудняюсь коментировать обычный switch который дописывает в переменную т.к. без break то в переменную поподут все последующие значения
function qwest2 ($a) {
    $qwest2inn = null;
    switch ($a){
            case 1 :
                $qwest2inn = "1" . "<br>";
            case 2 :
                $qwest2inn .= "2" . "<br>" ;
            case 3 :
                $qwest2inn .= "3" . "<br>" ;
            case 4 :
                $qwest2inn .= "4" . "<br>" ;
            case 5 :
                $qwest2inn .= "5" . "<br>" ;
            case 6 :
                $qwest2inn .= "6" . "<br>" ;
            case 7 :
                $qwest2inn .= "7" . "<br>" ;
            case 8 :
                $qwest2inn .= "8" . "<br>" ;
            case 9 :
                $qwest2inn .= "9" . "<br>" ;
            case 10 :
                $qwest2inn .= "10" . "<br>" ;
            case 11 :
                $qwest2inn .= "11" . "<br>" ;
            case 12 :
                $qwest2inn .= "12" . "<br>" ;
            case 13 :
                $qwest2inn .= "13" . "<br>" ;
            case 14 :
                $qwest2inn .= "14" . "<br>" ;
            case 15 :
                $qwest2inn .= "15" ."<br>";
            } 
        return $qwest2inn;
    }
    $qwest2out =  qwest2(5); 

/*3)Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.*/
function qwest3sum($a, $b){
    return "Сумма = " . ($a + $b);}
    
function qwest3def($a, $b){
    return "Разница = " . ($a - $b);} 

function qwest3prod($a, $b){
    return "Произвидение = " . ($a * $b) ;} 
 
function qwest3quot($a, $b){
    return "Частное = " . ($a / $b);} 

 /*4)Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).*/
	function qwest4($a, $b, $i){
switch ($i) {
    case "+":
        return qwest3sum($a, $b);
        break;
    case "-":
        return qwest3def($a, $b);
        break;
    case "*":
        return qwest3prod($a, $b);
        break;
    case "/":
        return qwest3quot($a, $b);
        break;
}};
$qwest3_4 = qwest4(12,6,'*');
/*Задание 3 и 4 для меня показались странными. Я понимаю что нас пытаются научить обращаться 
с функциями но не логично из функции вызывать функцию что бы выполнить простейшее действие в данном случае арефметическое, это гараздо легче сделать дописав знак в теле функции.*/

/*5) Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.*/
//Это свмое простое задание этого урока. Делал вывод года еще к 1ому уроку
$qwest5 = date("d, m, Y");

/*6) С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.*/
/* Тут уже были сложности пока читал и потихоньку понимал как сделать так что бы функция все глубже и глубже закапывалась сама в себя.
 А вот отсечение отрицательных и нулевых вариантов это после понимания самой сути далось легко*/
function qwest6($val, $pow){
		if ($pow == 0)
			return 1;
		elseif ($val == 0)
			return 0;
		elseif ($pow < 0)
			return qwest6(1/$val, -$pow);
		else
			return $val *  qwest6($val, $pow-1);
	}
$qwest6 = qwest6(5, 3);

/*7) *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты*/
/*7) Тут не скажу что очень сложно больше долго. Сначала понять какие окончания на какой цифре подходят после чего написать ветвление
с часами легче а вот с минутами там надо отдельно вынести время с 11 до 14 минут а у остального отсечь окончание и по нему орентироваться.
был вариант без отсечения окончания но там условие в elseif выходило на 1.5-2 строчки, такой код мне показался трудночитаемым*/
function qwest7(){
            $h = (date("G"));
            $m = date("i");
            $hText = null;
            $mText = null;
	        if ($h == 1 || $h == 21) {
                $hText = 'час';}
            elseif (($h >= 5 && $h <= 20) || $h = 0) {
                $hText = 'часов';}
            else {
                $hText = 'часа';}  
            
  
             if ($m >= 11 && $m <= 14) { 
			    $mText = 'минут';}
			else {
				$last = $m % 10 ;
				if ($last == 1){
					$mText = 'минута';}
				else if ($last == 0 || $last > 4) {
					$mText = 'минут';}
				else {
			    	$mText = 'минуты';};
			    };

    return $h . ' ' . $hText . ' ' . $m . ' ' . $mText;
};
$qwest7 = qwest7();


echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
</head>
<body>
<h3>Задание №1</h3>
    <div>
    Функция отработала с заданными числами 5 и 3 результат =  $qwest1def <br>
    Функция отработала с заданными числами -2 и -5 результат = $qwest1prod<br>
    Функция отработала с заданными числами 7 и -3 результат = $qwest1sum<br></div>
    <h3>Задание №2</h3>
    <div>Функция начинает работу с заданного числа 5 <br> $qwest2out</div>
    <h3>Задание №3,№4</h3>
    <div>Передаем в функцию 12,6,'*' и получаем $qwest3_4</div>
    <h3>Задание №6</h3>
    <div>5 в 3 степени будет $qwest6</div>
    <h3>Задание №7</h3>
    <div>Вывод времени с правельными окончаниями $qwest7</div>
    <h3>Задание №5</h3>
    <footer>В переменную через функцию PHP записываем сегодняшнее число и выводим его. Сегодня $qwest5</footer>
</body>
</html>";









