<?php

    $series = ['AAA', 'AAB', 'ABA', 'ABB', 'BAA', 'BAB', 'BBA', 'BBB'];

    $numbers = [];
    $output = [];

    foreach($series as $value) {
        for($j = 0; $j < 1000; $j++) {
            $number = str_pad($j, 3, '0', STR_PAD_LEFT);
            $numbers[] = "$value[0]$number$value[1]$value[2]";
        }
    }

    # var_dump($numbers);

    $i = 0;
    $offset = 0;
    $length = 0;
    while ($i < count($numbers)) {        
        if($numbers[$i][1] == $numbers[$i][2] && $numbers[$i][2] == $numbers[$i][3]) {
            array_splice($numbers, $offset, $length, []);
            $length = 0;
            $i = $offset;
            $offset++;
        } else {
            $length++;
        }
        $i++;
    }

    var_dump($numbers);