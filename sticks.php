<?php
const FIRST_PLAYER = 1;
const SECOND_PLAYER = 2;

$playerTurn = FIRST_PLAYER;
$sticksAmount = 10;
print_r ('Всего 10 палочек' . PHP_EOL);

function sticksRemove($sticksAmount,$playerTurn){
	$sticksLeft = $sticksAmount;
	while($sticksAmount == $sticksLeft) {
		if($playerTurn == FIRST_PLAYER) {
			print_r('Ход игрока номер один.' . PHP_EOL);
		} else {
			print_r('Ход игрока номер два.' . PHP_EOL);
		}
		$removeAmount = readline('Сколько палочек убрать?' . PHP_EOL);
		if ($removeAmount <= 3 and $removeAmount >= 1 and $removeAmount <= $sticksLeft){
			$sticksLeft = $sticksLeft - $removeAmount;
		} else {
			echo('Некорректное количество палочек, подумай еще разок ;)' . PHP_EOL . PHP_EOL);
		}
	}
	return $sticksLeft;
}

while($sticksAmount > 0){
	if($playerTurn == FIRST_PLAYER){
		$sticksAmount = sticksRemove($sticksAmount,$playerTurn);
		$playerTurn = SECOND_PLAYER;
		print_r('Осталось ' . $sticksAmount . ' палочек.' . PHP_EOL . PHP_EOL);
	} else {
		$sticksAmount = sticksRemove($sticksAmount,$playerTurn);
		$playerTurn = FIRST_PLAYER;
		print_r('Осталось ' . $sticksAmount . ' палочек.' . PHP_EOL . PHP_EOL);
	}
}
print_r('Палочки закончились. Победил игрок номер ');
if($playerTurn == FIRST_PLAYER){
	echo('один!');
} else {
	echo('два!');
}