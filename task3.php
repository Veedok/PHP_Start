<?php
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true?  Потому что стоит двойное = что означает не явное приведение к одному типу в данном случае числовому 
    var_dump((int)'012345');     // Почему 12345? Потому что (int) это приведение строки к числу
    var_dump((float)123.0 === (int)123.0); // Почему false? Потому что стоит строгое сравнение. float это число с плавающей точкой которое не равно int целому числу
    var_dump((int)0 === (int)'hello, world'); // Почему true? Потому что приведение строки к int будет равнятся 0
    