<?php

class TestParent
{
    private function testMethod()
    {
        echo 'It works!';
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