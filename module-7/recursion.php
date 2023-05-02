<?php

// Callback, is_callable()
$simpleNumber = 7;
function cbOne ($name): string
{
    return 'My name is ' . $name;
}

function runCallback ( $fName ) {
    if (is_callable( $fName )) {
        echo call_user_func( $fName, $fName ) . PHP_EOL;
    }
}

runCallback ( 'cbOne' );
runCallback ( 'simpleNumber' );


//recursion Array_map
$numbers = [1,2,3,4,5];
function factorial($n) {
    return $n > 1 ? $n * factorial($n - 1) : $n;
}

//$factorials = array_map('factorial', $numbers);
$sqrtNumbers = array_map('sqrt', $numbers); // sqrt встроенная функция

echo 'Result ' . PHP_EOL;
//print_r( $factorials );
print_r( $sqrtNumbers );

echo 'Start' . PHP_EOL;
print_r( $numbers );


