<?php
/*1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.*/
function quest1(){
    $i = 0;
    $result = "<br>";
    while ($i < 100){
        if ($i == 0){
            $i++;
            continue;
        } elseif ($i % 3 == 0){
            $result .= $i . " ";
        }
        $i++;
        continue;
    }
    return $result;
} 
$quest1print = quest1();
//Тут все просто обычный цикл после проверка условия при истине добавление в переменную. Ноль решил исключить.

/*2ю С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
0 – ноль.
1 – нечетное число.
2 – четное число.
3 – нечетное число.
…
10 – четное число.*/
function quest2(){
    $i = 0;
    $result = "<br>";
    do {
        if ($i == 0){
            $result .= $i . " - Ноль" . "<br>";
            $i++;
        } elseif ($i % 2 == 0){
            $result .= $i . " - Четное число" . "<br>";
            $i++;
        } else {
            $result .= $i . " - Нечетное число" . "<br>";
            $i++;
        }
    } while ($i < 11);
    return $result;
} 
$quest2print = quest2();
//Тут аналогично первому заданию просто другие условия.

/*3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
Московская область:
Москва, Зеленоград, Клин
Ленинградская область:
Санкт-Петербург, Всеволожск, Павловск, Кронштадт
Рязанская область … (названия городов можно найти на maps.yandex.ru).*/
$cities_and_regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Рязань", "Касимов", "Сасово"],
];
function quest3($array){
    $result = "<br>";
    foreach ($array as $region => $cities ){
        $result .= "<h4>" . $region . "</h4>";
        foreach ($cities as $city){
            $result .= $city . "<br>";
        }
    }
    return $result;
} 
$quest3print = quest3($cities_and_regions);
//Тут когда читал задачу думал будет в разы сложнее.

/*4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк.*/
$alphabet = [
    "а" =>"a",
    "б" =>"b",
    "в" =>"v",
    "г" =>"g",
    "д" =>"d",
    "е" =>"e",
    "ё" =>"e",
    "ж" =>"j",
    "з" =>"z",
    "и" =>"i",
    "й" =>"i",
    "к" =>"k",
    "л" =>"l",
    "м" =>"m",
    "н" =>"n",
    "о" =>"o",
    "п" =>"p",
    "р" =>"r",
    "с" =>"s",
    "т" =>"t",
    "у" =>"y",
    "ф" =>"f",
    "х" =>"h",
    "ц" =>"c",
    "ч" =>"ch",
    "ш" =>"sh",
    "щ" =>"sh",
    "ъ" =>"4",
    "ы" =>"6i",
    "ь" =>"4",
    "э" =>"e",
    "ю" =>"yu",
    "я" =>"ya",    
];
$string = "Мне нравится учиться и каждый день узнавать что то новое";
$quest4print = str_replace(array_keys($alphabet), array_values($alphabet) , $string);
/*Тут было посложнее, но сложности не с освоением функции str_replace а с пониманием как получить сперва все ключи массива а потом все их значения.
 Сперва пробовал через key([$array]) и current([$array]) потом пришло понимание что это не то что нужно мне в данной ситуации.*/

/*5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.
Написать функцию транслитерации строк.*/
$quest5print = str_replace(" ", "_" , $quest4print);
//После освоения str_reaplace легче легкого

/*6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.*/
function quest6($array){
    $result = "<ul>";
    foreach ($array as $region => $cities ){
        $result .= "<li>" . $region ."<ul>" ;
        foreach ($cities as $city){
            $result .= "<li>" . $city . "</li>";
        }
        $result .= "</li>" . "</ul>";
    }
    $result .= "</ul>";
    return $result;
} 
$quest6print = quest6($cities_and_regions);
//Немного меняем разметку в задачи №3 и получаем меню с подменю

/**Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так:
for (…){ // здесь пусто}*/
function quest7(){
    $result = null;
    for ($i = 0; $i < 10; $result .= $i++ . " "){};
    return $result;
} 
$quest7print = quest7();
//Эту задачу решали на других курсах по JS. Правильное (но говнокдное) решение высказал еще на уроке

/**Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».*/
function quest8($array){
    $result = "<br>";
    foreach ($array as $region => $cities ){
        $result .= "<h4>" . $region . "</h4>";
        foreach ($cities as $city){
            if(mb_substr($city, 0, 1)== "К"){
                $result .= $city . "<br>";
            }
        }
    }
    return $result;
} 
$quest8print = quest8($cities_and_regions);
//Просто добавляем проверку первого символа через ветвление в задачу №3

/**Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).*/
function quest9($string,$translit) {
    $result = str_replace(array_keys($translit), array_values($translit), $string);
    $result = str_replace(" ", "_", $result);
    return $result;
}
$quest9print = quest9($string, $alphabet);
//Тут долго возился пытался вставить в str_replase два значения примерно таким образом (array_keys($translit) || " ") или таким (array_keys($translit), " ") перепробовал многое но так не сработало, менять массив (дописывать в него еще 1 ключ, значение) считаю не практичным т.к. данные к нам зачастую просто приходят и мы не должны их менять а должны обработать. Поэтому сделал все в 2 шага.
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
    <div>Вывод чисел от 0 до 100 которые делятся на 3  $quest1print <br></div>
<h3>Задание №2</h3>
    <div>Вывод чисел от 0 до 10 и объявление их четности  $quest2print <br></div>
<h3>Задание №3</h3>
    <div>Вывод областей и городов в них  $quest3print <br></div>
<h3>Задание №4</h3>
    <div>Транслитерация строки <br>'Мне нравится учиться и каждый день узнавать что то новое'.<br>  $quest4print <br></div>
<h3>Задание №5</h3>
    <div>Замена пробелов на подчеркивание в той же строке.<br>  $quest5print <br> </div>
<h3>Задание №6</h3>
    <div>Создание меню с подменю<br>  $quest6print <br> </div>
<h3>Задание №7</h3>
    <div>Вывод чисел через пустое тело цикла<br>  $quest7print <br> </div>
<h3>Задание №8</h3>
    <div>Вывод городов только на букву 'К'<br>  $quest8print <br> </div>
<h3>Задание №9</h3>
    <div>Одновременное выполнение 4ого и 5ого задания<br>  $quest9print <br> </div>
</body>
</html>";










