<?php

    class TestClass {
        private $testField_1, $testField_2;

        public function setValues() {
            $this->testField_1 = 'This is';
            $this->testField_2 = 'test';
        }
        public function showFields() {
            $this->setValues();
            echo $this->testField_1 . ' ' . $this->testField_2 . PHP_EOL;
        }
    }

    $testObject = new TestClass();
    $testObject->showFields();