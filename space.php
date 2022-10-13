<?php
$space = [
		[0,0,0,0,0,0,0,0,0,0],
		[0,0,0,1,0,0,0,0,0,0],
		[0,1,0,1,0,0,0,0,0,0],
		[0,0,1,1,0,0,0,0,0,0],
		[0,0,0,0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0,0,0,0],
		[0,0,0,0,0,0,0,0,0,0],
		[0,1,0,0,0,0,0,0,0,0],
		[0,1,0,0,0,0,0,0,0,0],
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
			if($yCoordinate == 0 or $yCoordinate == 9){
				echo "~";
			}
			elseif($xCoordinate == 0 or $xCoordinate == 9){
				echo "|";
			}
			else {
				if ($x == ALIVE){
					echo "#";
				}
				if ($x == DEAD){
					echo ".";
				}
			}
		}
		echo PHP_EOL;
	}
	echo PHP_EOL;
}

function countAliveNear($y,$x,$space){
		$nearSum = [
			$space[$y-1][$x-1],
			$space[$y-1][$x],
			$space[$y-1][$x+1],
			$space[$y][$x-1],
			$space[$y][$x+1],
			$space[$y+1][$x-1],
			$space[$y+1][$x],
			$space[$y+1][$x+1]			
			];
	return array_sum($nearSum);
}


function evaluate($space){
	$spaceEvaluated = $space;
	foreach($space as $y => $yCells){
		foreach($yCells as $x => $cellStatus){
			if(0<$y and $y<9 and 0<$x and $x<9){
				$nearCells = countAliveNear($y,$x,$space);
				$spaceEvaluated[$y][$x] = cellEvaluate($y,$x,$cellStatus,$nearCells);
			}
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

printSpace($space);

while($gameStatus == GAME_RUNNING){
	$spaceEvaluated = evaluate($space);
	if($space <> $spaceEvaluated){
		$space = $spaceEvaluated;
		printSpace($spaceEvaluated);
		usleep(500000);
	}
	else{
		$gameStatus = GAME_STOPPED;
		echo 'GAME OVER.';
	}
}
