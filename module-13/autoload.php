<?php

function getEntities($classname): void
{
    if(file_exists('homework/entities/' . $classname . '.php')) {
        require_once 'homework/entities/' . $classname . '.php';
    }
}

function getInterfaces($classname): void
{
    if(file_exists('homework/interfaces/' . $classname . '.php')) {
        require_once 'homework/interfaces/' . $classname . '.php';
    }
}

spl_autoload_register('getEntities');
spl_autoload_register('getInterfaces');