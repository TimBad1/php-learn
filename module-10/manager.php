<?php

//class Manager implements Countable {
//    private array $sales = [];
//
//    public function addSale($goodName)
//    {
//        $this->sales[] = $goodName;
//    }
//
//    public function count()
//    {
//        return count($this->sales);
//    }
//}
//
//$manager = new Manager();
//
//$manager->addSale('MackBook');
//$manager->addSale('ThinkPad');
//$manager->addSale('HP ProBook');
//
//echo 'Менеджер продал ' . count($manager) . ' ноутбуков' . PHP_EOL;

//class Manager implements Iterator {
//    private array $sales = [];
//    private $position = 0;
//
//    public function addSale($goodName)
//    {
//        $this->sales[] = $goodName;
//    }
//
//    public function current()
//    {
//        return $this->sales[$this->position];
//    }
//
//    public function key()
//    {
//        return $this->position;
//    }
//
//    public function rewind()
//    {
//        return $this->position = 0;
//    }
//
//    public function next()
//    {
//        ++$this->position;
//    }
//
//    public function valid()
//    {
//        return isset($this->sales[$this->position]);
//    }
//}
//
//$manager = new Manager();
//
//$manager->addSale('MackBook');
//$manager->addSale('ThinkPad');
//$manager->addSale('HP ProBook');
//
//echo 'Менеджер продал ' . PHP_EOL;
//
//foreach ($manager as $item) {
//    echo $item . PHP_EOL;
//}

//class Manager implements Serializable {
//    private array $sales = [];
//    private $department = 'Отдел продаж';
//    private $name = 'Василий';
//
//    public function addSale($goodName)
//    {
//        $this->sales[] = $goodName;
//    }
//
//    public function serialize()
//    {
//        return serialize($this->sales);
//    }
//
//    public function unserialize(string $data)
//    {
//        $this->sales = unserialize($data);
//    }
//}
//
//$manager = new Manager();
//
//$manager->addSale('MackBook');
//$manager->addSale('ThinkPad');
//$manager->addSale('HP ProBook');
//
//echo serialize($manager) . PHP_EOL;

//class Manager implements Stringable {
//    private array $sales = [];
//    private $department = 'Отдел продаж';
//    private $name = 'Василий';
//
//    public function addSale($goodName)
//    {
//        $this->sales[] = $goodName;
//    }
//
//    public function __toString(): string
//    {
//        return $this->name . ' из ' . $this->department . PHP_EOL;
//    }
//}
//
//$manager = new Manager();
//
//$manager->addSale('MackBook');
//$manager->addSale('ThinkPad');
//$manager->addSale('HP ProBook');
//
//echo $manager . PHP_EOL;

class Manager implements ArrayAccess {
    private array $sales = [];
    private $department = 'Отдел продаж';
    private $name = 'Василий';

    public function addSale($goodName)
    {
        $this->sales[] = $goodName;
    }

    public function offsetGet($offset)
    {
        if(isset($this->sales[$offset])) {
            return $this->sales[$offset];
        }
    }

    public function offsetSet($offset, $value)
    {
        $this->sales[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return isset($this->sales[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->sales[$offset]);
    }
}

$manager = new Manager();

$manager->addSale('MackBook');
$manager->addSale('ThinkPad');
$manager->addSale('HP ProBook');
$manager[3] = 'Lenovo';

echo $manager[0] . PHP_EOL;

