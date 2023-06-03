<?php

class Ticker {
    private  $string;
    public function setString($value)
    {
        if(stripos($value, '<script>') !== false) {
            echo 'Строка содержит инъекции кода' . PHP_EOL;
            return;
        }
        $this->string = $value;
    }
    public function getString()
    {
        return strtoupper($this->string);
    }

    public function  __set($name, $value)
    {
        if($name == 'string') {
            $this->setString($value);
        }
    }

    public function __get($name) {
        if($name == 'string') {
            return $this->getString();
        }
    }
}

$ticket = new Ticker();
//$ticket->setString('<script>alert();</script>');
$ticket->setString('Я строка, бегущая строка, подо мной, пляшут облака');
//echo $ticket->getString() . PHP_EOL;
echo $ticket->string . PHP_EOL;