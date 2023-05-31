<?php

class Employee {
    public $name, $position, $age;
    public function  setParameters($name, $position, $age) {
        $this->name = $name;
        $this->position = $position;
        $this->age = $age;
    }

    public function showEmployee() {
        echo 'Сотрудник ' . $this->name . ' в должности ' . $this->position . PHP_EOL;
    }
}

class  Accoutantant extends Employee {
    public function  prepareReport() {
        echo "Я готовлю отчёт" . PHP_EOL;
    }
}

class  CEO extends Employee {
    public function fireEmployee() {
        echo "Я уволил " . $name . PHP_EOL;
    }
}

class  Welder extends Employee {
    public function makeWeld($name) {
        echo "Я делаю сварку" . PHP_EOL;
    }
}

$accoutantant = new Accoutantant();
$accoutantant->setParameters( 'Иван', 'Главный бухгалтер', 40);
$accoutantant->prepareReport();
$accoutantant->showEmployee();