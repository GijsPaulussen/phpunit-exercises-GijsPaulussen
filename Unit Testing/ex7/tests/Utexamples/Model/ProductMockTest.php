<?php

namespace Utexamples\Model;

use \PDO;
use \PDOStatement;

/**
 * Class ProductMockTest
 * @package Utexamples\Model
 *
 * @group MockTest
 */
class ProductMockTest extends \PHPUnit_Framework_TestCase
{
    public function testProductAddToDatabase()
    {
        // let's mock the prepare statement
        $pdostmt = $this->getMock('PDOStatement', array ('execute'));
        $pdostmt->expects($this->atLeastOnce())
            ->method('execute')
            ->will($this->returnValue(true));
        // let's mock the PDO object and return the mocked statement
        $pdo = $this->getMock('PDO', array ('prepare'), array ('sqlite::memory:'));
        $pdo->expects($this->once())
            ->method('prepare')
            ->will($this->returnValue($pdostmt));

        $data = array (
            'code' => 'TST',
            'title' => 'Test',
            'description' => 'Testing Test',
            'image' => 'http://www.example.com/image.png',
            'price' => 10.00,
            'created' => '2013-12-15 01:55:00',
            'modified' => '2013-12-20 16:00:00',
        );

        $product = new Product($data);
        $productMapper = new ProductMapper($pdo);
        $productMapper->save($product);

        // The model has mentioning of productId
        $data['productId'] = null;

        $this->assertEquals($data, $product->toArray(),
            'Product data is not matching expected resultset');
    }
}
