<?php
$kod = 0;
while (hash('sha256',$kod) != '5f9c4ab08cac7457e9111a30e4664920607ea2c115a1433d7be98e97e64244ca') {
	$kod++;
	echo 'Пробуем код: ' . $kod . PHP_EOL;
}
if($kod<10) {
	echo 'Загаданный код: 000' . $kod;
}
elseif($kod<100) {
	echo 'Загаданный код: 00' . $kod;
}
elseif($kod<1000){
	echo 'Загаданный код: 0' . $kod;
}
else {
	echo 'Загаданный код: ' . $kod;
}