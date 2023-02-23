<?php

    $deposit = 100000;
    $pro = 1.08;

    $sum = $deposit;
    $count = 0;

    do {
        if ($count % 3 == 0 && $count != 0) {
            $pro += 0.02;
        }
        $sum *= $pro;
        $count++;
    } while ($sum < ($deposit * 2));

    var_dump($sum);