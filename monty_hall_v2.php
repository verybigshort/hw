<?php
$number_of_games = readline('Введите количество игр: ');
while($i < $number_of_games){
	$array = array_fill(0, 3, 0);
	$array[rand(0,2)] = 1;
	$first_choice = rand(0,2);
	if($array[$first_choice] == 1) {
		$win_no_swap = $win_no_swap + 1;
	}
	else {
			$win_swap = $win_swap + 1;
		}
	$i++;
}
$percent_no_swap = round($win_no_swap/$number_of_games*100,2);
$percent_swap = round($win_swap/$number_of_games*100,2);
echo 'Побед без смены выбора: ' . $win_no_swap . '; процент побед: ' . $percent_no_swap . PHP_EOL;
echo 'Побед со сменой выбора: ' . $win_swap . '; процент побед: ' . $percent_swap;