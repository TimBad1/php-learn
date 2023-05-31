<?php

trait  VehicleFunction {
    public  function  ride() {
        echo 'Я могу ехать' . PHP_EOL;
    }

    public  function  fly() {
        echo 'Я могу летать' . PHP_EOL;
    }
}

class Car {
    use VehicleFunction;
}
class Plane {
    use VehicleFunction;
}

class FantomasCar {
    use VehicleFunction;
    public function escape() {
        $this->ride();
        $this->fly();
    }
}

$fantomasCar = new FantomasCar();
$fantomasCar->escape();