<?php

//function __autoload($classname)
//{
//    include_once './' . $classname . '.php';
//}

use library2\SecondClass;

function loaderLibOne($classname): void
{
    if(file_exists('library1/' . $classname . '.php')) {
        require_once 'library1/' . $classname . '.php';
    }

}

function loaderLibTwo($classname): void
{
    require_once 'library2/' . $classname . '.php';
}

spl_autoload_register('loaderLibOne');
spl_autoload_register('loaderLibTwo');


//$testObject = new TestClass();
//$testObject->testExecution();

//$anotherObject = new AnotherClass();
//$anotherObject->testExecution();
//
$secondObject = new SecondClass();
//$secondObject->testExecution();