<?php
    class Employee
    {
        public $age, $gender, $name, $surname, $position;
        function displayName() {
            echo $this->name . PHP_EOL;
        }

        function displayAge() {
            echo $this->age . PHP_EOL;
        }

        function changePosition($newPosition) {
            echo $this->position = $newPosition;
        }
    }

    $employee_1 = new Employee();
    $employee_2 = new Employee();


    $employee_1->age = 30;
    $employee_1->gender = 'male';
    $employee_1->name = 'Nick';
    $employee_1->surname = 'Ivanov';
    $employee_1->position = 'СЕО';

    $employee_2->age = 33;
    $employee_2->gender = 'female';
    $employee_2->name = 'Ann';
    $employee_2->surname = 'Petrova';
    $employee_2->position = 'СТО';


    $employee_1->displayName();
    $employee_2->displayName();
    $employee_2->changePosition('СЕО');

    print_r($employee_2);