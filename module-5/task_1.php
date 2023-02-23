<?php

$word = 'HelloWorld123!@#$';
$code = '';
$shift = 3;

for($i = 0; $i < strlen($word); $i++) {
    $c = ord($word[$i]) + $shift;
    $code[$i] = $c <= 255 ? chr($c) : chr($c - 256);
}

echo $code;

$i = 0;
while ($i < strlen($code)) {
    $c = ord($code[$i]) - $shift;
    $word[$i] = $c >= 0 ? chr($c) : chr($c + 256);
    $i++;
}

echo $word;
