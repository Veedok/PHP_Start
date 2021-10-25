<?php
echo "Для решения этой задачи читал вот эту статью <a href='https://tproger.ru/problems/write-a-function-which-swaps-the-values-of-variables-without-temporary-variables/' target='_blank'>разбор решения через битовые операции от Г. Лакмана Макдауэлла</a>  <br>";
$a=4;
$b=5;
echo $a . $b;
$a = $a ^ $b;
$b = $b ^ $a;
$a = $a ^ $b;
echo "<br>";
echo $a . $b;