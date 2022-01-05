<?php


function bubbleSort($array){
    for($i=0; $i<count($array); $i++){
$count = count($array);
       for($j=$i+1; $j<$count; $j++){
           if($array[$i]>$array[$j]){
               $temp = $array[$j];
               $array[$j] = $array[$i];
               $array[$i] = $temp;
           }
      }         
   }
   return $array;
}

function shakerSort ($array) {
    $n = count($array);
    $left = 0;
    $right = $n - 1;
    do {
    for ($i = $left; $i < $right; $i++) {
    if ($array[$i] > $array[$i + 1]) {
    list($array[$i], $array[$i + 1]) = array($array[$i + 1], $array[$i]);
    }
    }
    $right -= 1;
    for ($i = $right; $i > $left; $i--) {
    if ($array[$i] < $array[$i - 1]) {
    list($array[$i], $array[$i - 1]) = array($array[$i - 1], $array[$i]);
    }
    }
    $left += 1;
    } while ($left <= $right);
    }


    function heapify(&$arr, $countArr, $i)
{
$largest = $i; // Инициализируем наибольший элемент как корень
$left = 2*$i + 1; // левый = 2*i + 1
$right = 2*$i + 2; // правый = 2*i + 2

// Если левый дочерний элемент больше корня
if ($left < $countArr && $arr[$left] > $arr[$largest])
 $largest = $left;

//Если правый дочерний элемент больше, чем самый большой элемент на данный момент
if ($right < $countArr && $arr[$right] > $arr[$largest])
 $largest = $right;

// Если самый большой элемент не корень
if ($largest != $i)
{
 $swap = $arr[$i];
 $arr[$i] = $arr[$largest];
 $arr[$largest] = $swap;

 // Рекурсивно преобразуем в двоичную кучу затронутое поддерево
 heapify($arr, $countArr, $largest);
}
}

//Основная функция, выполняющая пирамидальную сортировку
function heapSort(&$arr)
{
$countArr = count($arr);
// Построение кучи (перегруппируем массив)
for ($i = $countArr / 2 - 1; $i >= 0; $i--)
 heapify($arr, $countArr, $i);

 for ($i = $countArr-1; $i >= 0; $i--)
 {
  // Перемещаем текущий корень в конец
  $temp = $arr[0];
  $arr[0] = $arr[$i];
  $arr[$i] = $temp;
 
  // вызываем процедуру heapify на уменьшенной куче
  heapify($arr, $i, 0);
 }
 return $arr;
 }
 
 /* Вспомогательная функция для вывода на экран массива размера n */
 function printArray(&$arr)
 {
 $countArr = count($arr);
 for ($i = 0; $i < $countArr; ++$i)
  echo ($arr[$i]." ") ;
 
 }
 
 // Тестирование
 $arr = [];
 for ($i=0; $i < 1000; $i++) { 
     $arr[]= rand(0,100);
 }
 $start= microtime(true);
 $sortArr = heapSort($arr);
 $end = microtime(true);
// echo 'Time : ' . ($end-$start); 
InterpolationSearch($sortArr, 45);
//  echo 'Отсортированный массив: ' . PHP_EOL;
//  heapSort($arr); Самая быстрая сортировка на 1 000 000 элементов у меня сортирует за  3.0462369918823
//  shakerSort($arr); Сортировка массива из 10 000 заняла 3.0150511264801
//  bubbleSort($arr); Сортировка массива из 10 000 заняла 1.5519878864288
function InterpolationSearch($myArray, $num)
{
$start = 0;
$last = count($myArray) - 1;
$steps = 0;

while (($start <= $last) && ($num >= $myArray[$start]) 
&& ($num <= $myArray[$last])) {
   $steps++;
 $pos = floor($start + (
   (($last - $start) / ($myArray[$last] - $myArray[$start]))
   * ($num - $myArray[$start])
  ));
 if ($myArray[$pos] == $num) {
  return $pos;
 }

 if ($myArray[$pos] < $num) {
  $start = $pos + 1;
 }

 else {
  $last = $pos - 1;
 }
 
}
echo ($steps);
return null;
}

