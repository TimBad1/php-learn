<?php

    $supportedOperators = ['+', '-', '*', '/'];
    $callsHistory = [];

    function calculateOperation( array &$history , int $a, int $b, string $operation = '+' ) : int
    {
        $history[] = $a . ' ' . $operation . ' ' . $b;
        if ($operation == '+') {
            return  $a + $b;
        } elseif ($operation == '-') {
            return  $a - $b;
        } elseif ($operation == '*') {
            return  $a * $b;
        } elseif ($operation == '/') {
            return  $a / $b;
        } else return 0;
    }   

    function parseOperator( $userInput, $operator) {
        $parseResult = explode($operator, $userInput );
        if ( $parseResult && count($parseResult) == 2) {
            return ['operators' => $parseResult, 'operator' => $operator];
        }
        return false;
    }

    do {
        $userInput = readline( 'Введите выражение: ');
        if($userInput == 'q') {
            print_r($callsHistory);
        }
        foreach( $supportedOperators as $operator) {
            $parseResult = parseOperator($userInput, $operator);
            if($parseResult) {
                echo 'Результат = ' . calculateOperation( $callsHistory, intval($parseResult['operators'][0]), intval($parseResult['operators'][1]), $parseResult['operator']) . PHP_EOL;
            }
        }
    } while (true);









    for($i = 1; $i <=100; $i++) {
        if (isValidateNumber($i)) {
            echo 'Число ' . $i . ' делится на 3 ' . PHP_EOL;
        }
    };

    function isValidateNumber($n)
    {
        return $n % 3 === 0;
    }

    # displayParametrs( 1, 2, 3);

    function displayString(string $str, int $n) : array
    {
        $result = [];
        for ($i = 0; $i < $n; $i++) {
            $result[$i] = $str;
        }

        return $result;
    }

    $resultArray =  displayString('Test string', 3);

    foreach ($resultArray as $result) {
        # echo $result . PHP_EOL;
    }


    # Передача параметров по ссылкам и значениям;

    $numbersArray = [1,4,5,8,9,2,0];
    $elementsNumber = count($numbersArray);

    function truncArray(&$numbersArray, $elementsNumber)  # & передаёт переменную по ссылке и мы работаем непосредственно с исходной версией данной переменной
    {
        for ($i = 0; $i < $elementsNumber; $i++) {
            if ( $i % 2 !== 0 ) {
                unset($numbersArray[$i]);
            }
        }
        # print_r($numbersArray);
    }

    # truncArray($numbersArray, $elementsNumber);
    # print_r($numbersArray);