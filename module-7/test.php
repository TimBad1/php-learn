<?php
    $simpleNumber = 7;

    function cbOne($name){
        return 'My name is ' . $name;
    }

    function runCallBack ( $fName) {
        if (is_callable($fName)) {
            echo call_user_func( $fName, $fName ) . PHP_EOL;
        }
        
    }

# runCallBack('cbOne');
# runCallBack('simpleNumber');

    $numbers = [1, 2, 3, 4, 5];
    
    function factorial( $n ) {
        return $n > 1 ? $n * factorial( $n - 1 ) : $n;
    }

    $factorials = array_map('factorial', $numbers);

# echo "Результат " . PHP_EOL;
#    print_r( $factorials );

#    echo "Исходный " . PHP_EOL;
#    print_r( $numbers );

    $newNumbers = array_map('sqrt', $numbers) ; // sqrt встроенная функция

    # echo "Результат " . PHP_EOL;
    # print_r( $newNumbers );

    # echo "Исходный " . PHP_EOL;
    # print_r( $numbers );

# Анонимные функции

    $password = 'password';

    $cheackPassword = function ( $userPassword ) use ( &$password ) {
        return $userPassword === $password;
    };

    $password = 'der parol'; // объявление переменной происходит после инициализации функции, поэтому для того чтобы принимался новый пароль нужен & в use

    do {
        $userPasword = readline('Введите пароль: ');
            if ( $cheackPassword( $userPasword )) {
                echo 'Пароль верен ';
                break;
            } else {
                echo 'Пароль неверен ' . PHP_EOL;
            }
    } while(true);

# стрелочная функция

    $a = 1;

    $testClosure = fn () => $a;
#    echo $testClosure(); // 1