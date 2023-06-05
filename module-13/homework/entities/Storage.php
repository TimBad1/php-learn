<?php

require_once '../interfaces/LoggerInterface.php';
require_once '../interfaces/EventListenerInterface.php';
require_once './TelegraphText.php';

abstract class Storage implements LoggerInterface, EventListenerInterface {
    abstract function create(TelegraphText $obj);
    abstract function read($slug);
    abstract function update($slug, TelegraphText $obj);
    abstract function delete ($slug);
    abstract function list();

    public function logMessage(string $error)
    {
        $current = file_get_contents('log.txt');
        $current .= $error . PHP_EOL;
        file_put_contents('log.txt', $current);
    }

    public function lastMessages(int $count)
    {
        $lines = file('log.txt');
        if(count($lines) < $count) {
            for($i = 0; $i < count($lines); $i++) {
                echo $lines[$i];
            }
        } else {
            for($i = count($lines) - $count; $i < count($lines); $i++) {
                echo $lines[$i];
            }
        }
    }
    public function attachEvent(string $method, callable $funcName)
    {
        // TODO: Implement attachEvent() method.
    }
    public function detouchEvent(string $method)
    {
        // TODO: Implement detouchEvent() method.
    }
}