<?php

trait Car {
    public  function  move() {
        echo 'Я еду' . PHP_EOL;
    }
}

trait Plane {
    public  function  move() {
        echo 'Я лечу' . PHP_EOL;
    }
}

class FantomasCar {
    use Car, Plane {
        Car::move insteadof Plane;
        Plane::move as fly;
    }

    public function escape() {
        $this->move();
        $this->fly();
    }
}

$fantomasCar = new FantomasCar();
$fantomasCar->escape();