<?php

class ParentTest {
    protected const TEST_CONST = 'Parent';
    public function showField()
    {
//        echo self::TEST_CONST . PHP_EOL; // будет Parent и для родетеля и для дочернего
        echo static::TEST_CONST . PHP_EOL; // чтобы сиспользовать механизм позднего статического связывания
    }
}

class InheritTest extends ParentTest {
    protected const TEST_CONST = 'Inherit';
//    public function showField()
//    {
//        echo self::TEST_CONST . PHP_EOL;
//    }
}

$inheritTest = new InheritTest();
$inheritTest->showField();//