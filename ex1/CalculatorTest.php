<?php
namespace Utexamples;

Class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testCalculatorCanAddByOne()
    {
        $calculator = new Calculator();
        $result = $calculator->addByOne();
        $this->assertSame(1, $result);
    }
}