<?php

class TestParent
{
    protected function testMethod()
    {
        echo 'It works!' . PHP_EOL;
    }

    public function showMessage()
    {
        $this->testMethod();
    }
}

class TestInheritance extends TestParent {
    public function testPublic()
    {
        $this->testMethod();
    }
}

$testParentObject = new TestParent();
$testInheritanceObj = new TestInheritance();

//$testParentObject->testMethod();
//$testInheritanceObj->testPublic();
$testParentObject->showMessage();