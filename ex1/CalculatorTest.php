<?php
require_once 'Calculator.php';

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testCalculatorCanAddByOne()
    {
        $calculator = new Calculator();
        $result = $calculator->addByOne();
        $this->assertSame(1, $result);
    }
}
