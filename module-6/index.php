<?php

    $textStorage = [];

    function add( array &$storage, string $title, string $text) {
        $storage[] = ['title' => $title, 'text' => $text];
    }

    function remove( array &$storage, int $index ) {
        
        if($storage[$index]) {
            echo $storage[$index];
            unset($storage[$index]);
            return true;
        }
        return false;
    }

    # function edit( int $index, string $title, string $text, array &$storage ) {
    function edit( int $index, array &$storage ) {
        $newTitle = readline( 'Введите новый заголовок: ');
        $question1 = readline('Вы уверены что хотите поменять ' . $storage[$index]['title'] . ' на ' . $newTitle . '?' . PHP_EOL);
        if($question1 == 'да') {
            $storage[$index]['title'] = $newTitle;
        }

        $newText = readline( 'Введите новый текст: ');
        $question2 = readline('Вы уверены что хотите поменять ' . $storage[$index]['text'] . ' на ' . $newText . '?' . PHP_EOL);
        if($question2 == 'да') {
            $storage[$index]['text'] = $newText;
        }
    }

    add($textStorage, 'Название', 'описание');
    add($textStorage, 'Название2', 'описание2');

    remove($textStorage, 0);
    remove($textStorage, 5);

    print_r($textStorage);

    edit(1, $textStorage);

    print_r($textStorage);