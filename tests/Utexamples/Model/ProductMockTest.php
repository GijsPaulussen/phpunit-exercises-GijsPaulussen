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
    public function testProductsCanBeLoadedFromDatabase()
    {
        $data = array (
            array (
                'productId' => 1,
                'code' => 'TST1',
                'title' => 'Test 1',
                'description' => 'Testing product 1',
                'image' => 'http://www.example.com/image1.png',
                'price' => 10.00,
                'created' => '2013-12-01 01:55:00',
                'modified' => '2013-12-20 16:00:00',
            ),
            array (
                'productId' => 2,
                'code' => 'TST2',
                'title' => 'Test 2',
                'description' => 'Testing product 2',
                'image' => 'http://www.example.com/image2.png',
                'price' => 199.95,
                'created' => '2013-12-02 02:55:00',
                'modified' => '2013-12-20 16:00:00',
            ),
        );
        // let's mock the prepare statement
        $pdostmt = $this->getMock('PDOStatement', array ('execute', 'fetchAll'));
        $pdostmt->expects($this->atLeastOnce())
            ->method('execute')
            ->will($this->returnValue(true));
        $pdostmt->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue($data));
        // let's mock the PDO object and return the mocked statement
        $pdo = $this->getMock('PDO', array ('prepare'), array ('sqlite::memory:'));
        $pdo->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($pdostmt));

        $productCollection = new ProductCollection();
        $productCollection->setPdo($pdo);
        $productCollection->fetchAll();

        $this->assertEquals($data, $productCollection->toArray(),
            'Something wrong with fetching a collection of products');
    }

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
        $product->setPdo($pdo);
        $product->save();

        // The model has mentioning of productId
        $data['productId'] = null;

        $this->assertEquals($data, $product->toArray(),
            'Product data is not matching expected resultset');
    }
}
