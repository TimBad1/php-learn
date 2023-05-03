<?php
    class Building {
        const MAX_FLOOR = 20;
        private $floors;

        public function setFloorsNumber($floorsNumber)
        {
            echo 'Вызван метод ' . __METHOD__ . PHP_EOL;
            if ($floorsNumber > self::MAX_FLOOR) {
                echo 'превышено максимальное количество этажей' . PHP_EOL;
                return;
            }
            $this->floors = $floorsNumber;
        }

        public function showFloorsNumber()
        {
            echo $this->floors . PHP_EOL;
        }

        public function showClassName()
        {
            echo __CLASS__ . PHP_EOL;
        }
    }

    $building = new Building();
    $building->setFloorsNumber(30);
    $building->setFloorsNumber(15);
    $building->showFloorsNumber();

//    $newBuilding = new Building();
//    $newBuilding->setFloorsNumber(50);
//    $newBuilding->showFloorsNumber();

    $building->showClassName();

    echo Building::class; // Building