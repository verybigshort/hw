<?php
function elementFilter($var) {
	if ($var > 5){
		return false;
	}
	elseif ($var < -7){
		return false;
	}
	else {
		return true;
	}
}
$array1 = [1, 5, -7, -13, 8, 2, 2, 4, 10];
$array2 = [8, 5, 7, -6, -3, 2, -10, -15, 8];
$arrayBeforeFilter = array_merge($array1,$array2);
$arrayFiltered = array_filter($arrayBeforeFilter,'elementFilter');
print_r($arrayFiltered);