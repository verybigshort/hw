<?php
$array = array(1, 1, 76, 8, 35, 40, 89, 55, 22, 15);
$i = 0;
while ($i <= count($array)) {
	if($array[$i]>$max_value) {
		$max_value = $array[$i];
		$i++;
	}
	else {
		$i++;
	}
}
echo $max_value;