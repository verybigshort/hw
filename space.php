<?php
$space = [
		[0,0,0,0,0,0,0,0,0,0],
		[0,0,0,1,0,0,0,0,0,0],
		[0,1,0,1,0,0,0,0,0,0],
		[0,0,1,1,0,0,0,0,0,0],
		[0,0,0,0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0,0,0,0],
	];
	
const ALIVE = 1;
const DEAD = 0;

const GAME_RUNNING = 1;
const GAME_STOPPED = 0;

$gameStatus = GAME_RUNNING;

function printSpace($space){
	foreach($space as $yCoordinate => $y){
		foreach($y as $xCoordinate => $x){
			if ($x == ALIVE){
				echo "#";
			}
			if ($x == DEAD){
				echo ".";
			}
		}
		echo PHP_EOL;
	}
	echo PHP_EOL;
}

function countAliveNear($y,$x,$space){
		$nearSum = [
			getCellStatusByCoordinate($space,$y-1,$x-1),
			getCellStatusByCoordinate($space,$y-1,$x),
			getCellStatusByCoordinate($space,$y-1,$x+1),
			getCellStatusByCoordinate($space,$y,$x-1),
			getCellStatusByCoordinate($space,$y,$x+1),
			getCellStatusByCoordinate($space,$y+1,$x-1),
			getCellStatusByCoordinate($space,$y+1,$x),
			getCellStatusByCoordinate($space,$y+1,$x+1),
			];
	return array_sum($nearSum);
}


function evaluate($space){
	$spaceEvaluated = $space;
	foreach($space as $y => $yCells){
		foreach($yCells as $x => $cellStatus){
			$nearCellsAliveCount = countAliveNear($y,$x,$space);
			$isCellAlive = $cellStatus == 1;
			$newCellStatus = 0;
			if($isCellAlive) {
				if ($nearCellsAliveCount == 2 or $nearCellsAliveCount == 3){
					$newCellStatus = 1;
				}
			} else {
				if ($nearCellsAliveCount == 3){
					$newCellStatus = 1;
				}
			}
			$spaceEvaluated[$y][$x] = $newCellStatus;
		}
	}
	return $spaceEvaluated;
}
	
function cellEvaluate($y,$x,$cellStatus,$nearCells){
	if($cellStatus == 1){
		if ($nearCells == 2 or $nearCells == 3){
			$cellStatus = 1;
		}
		else{
			$cellStatus = 0;
		}
	}
	else{
		if($nearCells == 3){
			$cellStatus = 1;
		}
	}
	return $cellStatus;
}

function getCellStatusByCoordinate($space, $y, $x){
	if ($y == -1) {
		$y = 9;
	} elseif ($y == 10) {
		$y = 0;
	}
	if ($x == -1) {
		$x = 9;
	} elseif ($x == 10) {
		$x = 0;
	}
	return $space[$y][$x];
}
	

printSpace($space);

while($gameStatus == GAME_RUNNING){
	$spaceEvaluated = evaluate($space);
	if($space <> $spaceEvaluated){
		$space = $spaceEvaluated;
		printSpace($spaceEvaluated);
		usleep(250000);
	}
	else{
		$gameStatus = GAME_STOPPED;
		echo 'GAME OVER.';
	}
}
