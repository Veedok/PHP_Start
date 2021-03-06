<?php
// Задание №1
function dirfunc($name, $b) {
    $mydir = new DirectoryIterator($name);
    foreach($mydir as $item) {
        if ($item != '.' && $item != '..' && $item != '.git' && $item != 'OpenServer') {
            if (($item->getType()) == 'dir') {
                echo ($b . $item . PHP_EOL); 
                $ss = $b . "----";               
                dirfunc($item->getPathname(), $ss);
            } else {
                echo ($b . $item . PHP_EOL);
            }
        }
    }
}
dirfunc('PHP_start', '');

// поиск элемента массива с известным индексом,  O(1)
// дублирование массива через foreach, O(n)
// рекурсивная функция нахождения факториала числа. O(n)
### 3. Определить сложность следующих алгоритмов. Сколько произойдет итераций? 
// 1) ``` 
$n = 100;
$array[]= [];
for ($i = 0; $i < $n; $i++) {  // Тут цикл сделает 100 итераций
    for ($j = 1; $j < $n; $j *= 2) { // Тут цикл сделает 7 итераций (т.к. на 7ой итерации $j = 64 а на 8ой цикл не выполнится т.к. $j > $i)
        $array[$i][$j]= true;
        echo($j."\n");
    }
 }
// Итого получаем 700 итераций всего 
// // 2)

$n = 100;
$array[] = [];

for ($i = 0; $i < $n; $i += 2) { // тут пройдет 50 итераций
    for ($j = $i; $j < $n; $j++) { // тут кол во операций будет равно 100 - $i
        $array[$i][$j]= true;
        echo('j= '. $j."\n");
    }
echo('i= '. $i."\n");
}
