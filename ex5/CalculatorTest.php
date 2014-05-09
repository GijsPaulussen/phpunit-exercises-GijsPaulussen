<?php
require_once 'Calculator.php';

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Calculator::addByOne
     */
    public function testCalculatorCanAddByOne()
    {
        $calculator = new Calculator();
        $result = $calculator->addByOne();
        $this->assertSame(1, $result);
    }

    /**
     * @covers Calculator::addByValue
     * @covers Calculator::subtractByValue
     * @covers Calculator::multiplyByValue
     * @covers Calculator::divideByValue
     */
    public function testCalculatorRefusesNonIntegerValue()
    {
        $calculator = new Calculator();
        $result = $calculator->addByValue('foo');
        $this->assertSame(0, $result);
        $result = $calculator->subtractByValue('foo');
        $this->assertSame(0, $result);
        $result = $calculator->multiplyByValue('foo');
        $this->assertSame(0, $result);
        $result = $calculator->divideByValue('foo');
        $this->assertSame(0, $result);
    }

    /**
     * @covers Calculator::addByValue
     */
    public function testCalculatorAddsIntegerValue()
    {
        $calculator = new Calculator();
        $result = $calculator->addByValue(3);
        $this->assertSame(3, $result);
    }

    /**
     * @covers Calculator::subtractByValue
     */
    public function testCalculatorSubtractsIntegerValue()
    {
        $calculator = new Calculator();
        $result = $calculator->subtractByValue(3);
        $this->assertSame(-3, $result);
    }

    /**
     * @covers Calculator::multiplyByValue
     */
    public function testCalculatorMultipliesIntegerValue()
    {
        $calculator = new Calculator();
        $result = $calculator->multiplyByValue(3);
        $this->assertSame(0, $result);
    }

    /**
     * @covers Calculator::divideByValue
     */
    public function testCalculatorRejectsDivisionByZero()
    {
        $calculator = new Calculator();
        $result = $calculator->divideByValue(0);
        $this->assertSame(0, $result);
    }

    /**
     * @covers Calculator::divideByValue
     */
    public function testCalculatorDividesIntegerValue()
    {
        $calculator = new Calculator();
        $result = $calculator->divideByValue(3);
        $this->assertSame(0, $result);
    }
}
