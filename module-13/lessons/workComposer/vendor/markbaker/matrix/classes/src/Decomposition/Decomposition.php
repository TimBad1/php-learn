<?php

namespace workComposer\vendor\markbaker\matrix\classes\src\Decomposition;

use workComposer\vendor\markbaker\matrix\classes\src\Decomposition\LU;
use workComposer\vendor\markbaker\matrix\classes\src\Decomposition\QR;
use workComposer\vendor\markbaker\matrix\classes\src\Exception;
use workComposer\vendor\markbaker\matrix\classes\src\Matrix;

class Decomposition
{
    const LU = 'LU';
    const QR = 'QR';

    /**
     * @throws Exception
     */
    public static function decomposition($type, Matrix $matrix)
    {
        switch (strtoupper($type)) {
            case self::LU:
                return new LU($matrix);
            case self::QR:
                return new QR($matrix);
            default:
                throw new Exception('Invalid Decomposition');
        }
    }
}
