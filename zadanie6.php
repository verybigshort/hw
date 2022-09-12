<?php
$fibonacci_numbers = array(0,1);
$i = 2;
$j = 0;
while($i<50) {
	$fibonacci_numbers[$i++] = $fibonacci_numbers[$j] + $fibonacci_numbers[++$j];
}
echo 'Пятидесятое число Фибоначчи: ' . $fibonacci_numbers[49] . PHP_EOL;
echo 'Остаток от деления на два: ' . $fibonacci_numbers[49] % 2;