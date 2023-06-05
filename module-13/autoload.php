<?php

function getEntities($classname): void
{
    if(file_exists('homework/entities/' . $classname . '.php')) {
        require_once 'homework/entities/' . $classname . '.php';
    }
}

spl_autoload_register('getEntities');