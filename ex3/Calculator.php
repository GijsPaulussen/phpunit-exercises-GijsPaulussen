<?php
/**
 * Class that allows us to make all sorts of calculations
 */
class Calculator
{
    /**
     * @var int The starting value
     */
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

    /**
     * Adds the current value by a given value
     *
     * @param int $value The value to be added
     * @return int The total value of this method
     */
    public function addByValue($value)
    {
        if (is_int($value)) {
            $this->_value = $this->_value + $value;
        }
        return $this->_value;
    }

    /**
     * Subtracts the current value by a given value
     *
     * @param int $value The value to be subtracted
     * @return int The total value of this method
     */
    public function subtractByValue($value)
    {
        if (is_int($value)) {
            $this->_value = $this->_value - $value;
        }
        return $this->_value;
    }

    /**
     * Multiply the current value by a given value
     *
     * @param int $value The value to be multiplied
     * @return int The total value of this method
     */
    public function multiplyByValue($value)
    {
        if (is_int($value)) {
            $this->_value = $this->_value * $value;
        }
        return $this->_value;
    }

    /**
     * Multiply the current value by a given value
     *
     * @param int $value The value to be multiplied
     * @return int The total value of this method
     */
    public function divideByValue($value)
    {
        if (is_int($value)) {
            if (0 !== $value) {
                $this->_value = $this->_value / $value;
            }
        }
        return $this->_value;
    }
}
