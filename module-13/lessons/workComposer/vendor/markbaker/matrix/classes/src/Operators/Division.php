<?php

namespace workComposer\vendor\markbaker\matrix\classes\src\Operators;

use workComposer\vendor\markbaker\matrix\classes\src\Div0Exception;
use workComposer\vendor\markbaker\matrix\classes\src\Exception;
use workComposer\vendor\markbaker\matrix\classes\src\Matrix;
use workComposer\vendor\markbaker\matrix\classes\src\Functions;
use workComposer\vendor\markbaker\matrix\classes\src\Operators\Multiplication;
use workComposer\vendor\markbaker\matrix\classes\src\Operators\Operator;

class Division extends Multiplication
{
    /**
     * Execute the division
     *
     * @param mixed $value The matrix or numeric value to divide the current base value by
     * @throws Exception If the provided argument is not appropriate for the operation
     * @return $this The operation object, allowing multiple divisions to be chained
     **/
    public function execute($value, string $type = 'division'): Operator
    {
        if (is_array($value)) {
            $value = new Matrix($value);
        }

        if (is_object($value) && ($value instanceof Matrix)) {
            $value = Functions::inverse($value, $type);

            return $this->multiplyMatrix($value, $type);
        } elseif (is_numeric($value)) {
            return $this->multiplyScalar(1 / $value, $type);
        }

        throw new Exception('Invalid argument for division');
    }
}
