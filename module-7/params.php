<?php
function isValidNumber ($n) : bool
{
return $n % 3 === 0;
}

function displayResult($n, $isValidNumber) {
if (isValidNumber($n)) {
echo 'Число ' . $n . ' делится на 3 ' . PHP_EOL;
} else {
echo 'Число ' . $n . ' не делится на 3 ' . PHP_EOL;
}
}

////    for ($i = 1; $i <= 100; $i++) {
////        displayResult($i, isValidNumber($i));
////    }
//
function displayString (string $str, int $n) : array
{
$resultArray = [];
for ($i = 0; $i <$n; $i++) {
$resultArray[$i] =$str;
}
return $resultArray;
}
//
//    $resultArray = displayString('my string', 3);
//
////    foreach ($resultArray as $result) {
////        echo $result . PHP_EOL;
////    }
//
//    // Передача параметров по ссылке и по значению:
//
    $numbersArray = [1,2,3,5,7,9,0];
    $elementsNumber = count($numbersArray);

    function trunc(&$numbersArray, $elementsNumber) //  передача массива по ссылке, вне скоупа массив изменится
//  function trunc($numbersArray, $elementsNumber) //  передача массива по значению, вне скоупа массив не изменится
    {
        for ($i = 0; $i < $elementsNumber; $i++) {
            if ( $i % 2 !== 0) {
                unset($numbersArray[$i]);
            }
        }
    }
//
    trunc($numbersArray, $elementsNumber);
    print_r($numbersArray);