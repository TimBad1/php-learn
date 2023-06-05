<?php

require_once 'vendor/autoload.php';

$matrix = \workComposer\vendor\markbaker\matrix\classes\src\Builder::createFilledMatrix(1, 3, 3);

print_r($matrix);