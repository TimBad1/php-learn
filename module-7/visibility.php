<?php

    $visibleString = 'Very important information';

    function testOutput() {
        global $visibleString; // без глобального объявления переменной выдаст ошибку, или можно прокинуть переменную как параметр
        if(strlen($visibleString) > 0) {
            for ( $i = 0; $i < strlen($visibleString); $i++) {
                echo $visibleString[$i] . PHP_EOL;
            }
        }
    }

    testOutput();