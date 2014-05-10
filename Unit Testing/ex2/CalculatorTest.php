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

   public function testCalculatorRefusesNonIntegerValue()
   {
       $calculator = new Calculator();
       $result = $calculator->addByValue('foo');
       $this->assertSame(0, $result);
   }

   public function testCalculatorAddsIntegerValue()
   {
       $calculator = new Calculator();
       $result = $calculator->addByValue(3);
       $this->assertSame(3, $result);
   }
}
