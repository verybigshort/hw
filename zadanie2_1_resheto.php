<?php
$number = readline('Vvedite chislo: ');
$array = array_fill(2,$number-1,1);
$i = 2;
while($i<=$number) {
	if ($array[$i] == 1) {
		$j = $i;
		while ($j <= $number) {			
			$j = $j+$i;
			$array[$j] = 0;
		}
		$i++;
	}
	else {
		$i++;
	}
}
$i = 2;
while($i<=$number) {
	if($array[$i]==1) {
		echo $i . PHP_EOL;
		$i++;
	}
	else {
		$i++;
	}
}