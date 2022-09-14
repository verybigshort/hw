<?php
$array1 = array(1, 5, -7, -13, 8, 2, 2, 4, 10);
$array2 = array(8, 5, 7, -6, -3, 2, -10, -15, 8);
$arraySum = array_merge($array1,$array2);
$elementsSum = array_sum($arraySum);
echo 'Сумма элементов массива: ' . $elementsSum;