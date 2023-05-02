<?php
    // стрелочные функции
    $password = 'password';
    $checkPassword = function ( $userPassword) use ( &$password ) //при передаче про значению принимает то, которое передаём при инициализации - 'password'
    {                                                             //при передаче про ссылке принимает то, которое актуально сейчас - 'der parol'
        return $userPassword === $password;
    };

    $password = 'der parol';

//    do {
//        $userPassword = readline( 'Введите пароль ');
//
//        if ( $checkPassword ( $userPassword ) ) {
//            echo 'Пароль верен' . PHP_EOL;
//        } else {
//            echo 'Пароль неверен' . PHP_EOL;
//        }
//    } while (true);


    // область видимости

    $visibleString = 'Very important info';

//    function testOutput()                   // &$visibleString можно прокинуть и будет такой же результат как и global
//    {
//        global $visibleString;              // Объявили глобальный доступ
//        if (strlen($visibleString) > 0) {
//            for ($i = 0; $i < strlen($visibleString); $i++) {
//                echo $visibleString[$i] . PHP_EOL;
//            }
//        }
//    }

//testOutput();

    $testOutput = function () use( &$visibleString ) {
        $visibleString = 'new value';
//    if (strlen($visibleString) > 0) {
//        for ($i = 0; $i < strlen($visibleString); $i++) {
//            echo $visibleString[$i] . PHP_EOL;
//        }
//    }
    };

    $testOutput();
    echo $visibleString;

