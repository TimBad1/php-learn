<?php

include_once 'autoload.php';

$telegraph = new TelegraphText('Pushkin', 'test_text_file');
$telegraph->showTelegraph();
$telegraph->editText('Ещё более новая запись', 'Супер-заголовок');
//$telegraph->storeText();
//$telegraph->loadText('test_text_file');

$new_telegraph = new FileStorage;
$new_telegraph->create($telegraph);
$new_telegraph->read('test_text_file');
$new_telegraph->update('test_text_file', $telegraph);

//$new_telegraph->logMessage('first error');
//$new_telegraph->logMessage('second error');
//$new_telegraph->logMessage('third error');
//$new_telegraph->lastMessages(5);
