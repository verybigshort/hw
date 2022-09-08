<?php
$n = readline('Vvedite chislo: ');
for($i=2;$i<$n+1;$i++){
	$delitel = 1;
	$ostatok = 1;
	while($ostatok>0) {
		$delitel++;
		$ostatok = $i%$delitel;
	}
	if ($delitel == $i) {
		echo $delitel . PHP_EOL;
	}
}
