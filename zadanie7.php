<?php
$encodedArrays = '{"minuend":[2,21,14,46,3,6,7,37,45,8,44,34,32,49,16,25,50,36,39,28,24,29,38,11,33,13,43,17,30,51,42,15,4,23,48,26,22,9,40,47,20,18,10,12,27,31,5,1,19,41,35],"subtrahend":[18,31,23,49,29,37,1,48,54,10,30,42,17,14,50,47,27,15,25,52,21,46,24,38,4,22,51,12,33,13,20,39,8,32,2,7,11,43,55,53,5,45,36,6,35,44,34,19,16,40,9,41,28,26]}';
$decoded = json_decode($encodedArrays);
$minuend = $decoded->minuend;
$subtrahend = $decoded->subtrahend;
$minuend = array_diff($minuend,$subtrahend);
print_r($minuend);