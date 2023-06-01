<?php

interface StringWriter {
    public function writeString($str);
}

class FileWriter implements StringWriter {
    public function writeString($str)
    {
        file_put_contents('./example.txt', $str);
    }
}

class  ScreenWriter implements StringWriter {
    public function writeString($str)
    {
        echo $str . PHP_EOL;
    }
}

class StringProcessor {
    private $writer, $str;
    public function __construct(StringWriter $writer, $str)
    {
        $this->writer = $writer;
        $this->str = $str;
    }

    public function write()
    {
        $this->writer->writeString($this->str);
    }
}

$fileWriter = new FileWriter();
$screenWriter = new ScreenWriter();
$testString = 'Hello world!';

$stringFileProcess = new StringProcessor($fileWriter, $testString);
$stringScreenProcess = new StringProcessor($screenWriter, $testString);

$stringFileProcess->write();
$stringScreenProcess->write();