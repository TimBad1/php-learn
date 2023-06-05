<?php

require_once '../interfaces/EventListenerInterface.php';

abstract class User implements EventListenerInterface {
    protected $id, $name, $role;
    abstract function getTextsToEdit();
}
