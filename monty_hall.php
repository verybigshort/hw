<?php
$number_of_games = readline('Введите количество игр: ');
while($i < $number_of_games){
	$array = array_fill(0, 3, 0);
	$array[rand(0,2)] = 1;
	// print_r($array);
	$first_choice = rand(0,2);
	// echo 'Выбор игрока: ' . $first_choice . PHP_EOL;
	if($array[$first_choice] == 1) {
		$win_no_swap = $win_no_swap + 1;
	}
	else {
		$monty_choice = 0;
		while($array[$monty_choice] == 1) {
			$monty_choice = rand(0,2);
		}
		// echo 'Выбор Монти:' . $monty_choice . PHP_EOL;
		unset($array[$first_choice]);
		unset($array[$monty_choice]);
		if(array_sum($array) > 0){
			$win_swap = $win_swap + 1;
		}
	}
	$i++;
}
$percent_no_swap = round($win_no_swap/$number_of_games*100,2);
$percent_swap = round($win_swap/$number_of_games*100,2);
echo 'Побед без смены выбора: ' . $win_no_swap . '; процент побед: ' . $percent_no_swap . PHP_EOL;
echo 'Побед со сменой выбора: ' . $win_swap . '; процент побед: ' . $percent_swap;