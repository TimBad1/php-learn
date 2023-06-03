<?php

class Test {
    public static $publicField = 20;
    private static $privateField = 10;
    protected  static $protectedField = 1;
//    public function showPrivateField(): void
//    {
//        echo self::$privateField . PHP_EOL;
//    }
//
//    public function showProtectedField(): void
//    {
//        echo self::$protectedField . PHP_EOL;
//    }
}

class Inherit extends Test {
    public function showPrivateField(): void
    {
        echo self::$privateField . PHP_EOL;
    }

    public function showProtectedField(): void
    {
        echo self::$protectedField . PHP_EOL;
    }
}

//$testObject = new Test();
$testObject = new Inherit();
echo $testObject::$publicField . PHP_EOL;
//echo $testObject::$privareField . PHP_EOL; // ошибка, не можем обратиться к приватному полю
//echo $testObject->showPrivateField(); //не работает у наследника
//echo $testObject::$protectedField . PHP_EOL; // ошибка, не можем обратиться к защищённому полю
echo $testObject->showProtectedField();