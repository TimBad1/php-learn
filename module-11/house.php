<?php

class Building {
    protected $floors, $matherial;
    protected function setFloorsNumber($floorsNumber)
    {
        if($floorsNumber > 20) {
            echo 'количесство этажей не может быть больше 20' . PHP_EOL;
            return;
        }
        $this->floors = $floorsNumber;
    }
}

class House extends Building {
    private $heatingType, $address;
    public function __construct($floorsNumber, $matherial, $heatingType, $address)
    {
        $this->matherial = $matherial;
        $this->heatingType = $heatingType;
        $this->address = $address;
        $this->setFloorsNumber($floorsNumber);
    }

    public function showHouseDescription()
    {
        echo $this->matherial . PHP_EOL;
        echo $this->heatingType . PHP_EOL;
        echo $this->address . PHP_EOL;
    }
}

$cityHouse = new House(8, 'Кирпич', 'Газовое', 'улица Садовая');
$cityHouse->showHouseDescription();
//$cityHouse->heatingType = 'Уголь'; //выдаст ошибку, так как метод protected
