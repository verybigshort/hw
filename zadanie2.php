<?php
$n = readline('Vvedite chislo: ');
for($i=1; $i<$n+1; $i++){
	$ostatok = $i%2;
	if ($ostatok>0) {
		echo $i . PHP_EOL;
	}
}
