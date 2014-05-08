<?php
namespace Utexamples;

/**
 * Class that allows us to make all sorts of calculations
 */
class Calculator
{
    protected $_value = 0;

    /**
     * Adds the current value by one
     *
     * @return int The value from this method
     */
    public function addByOne()
    {
        $this->_value++;
        return $this->_value;
    }
}