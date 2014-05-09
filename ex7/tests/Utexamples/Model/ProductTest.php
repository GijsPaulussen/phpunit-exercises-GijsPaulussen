<?php
namespace Utexamples\Model;
/**
 * Class ProductTest
 * @package Utexamples\Model
 * @group Model
 */
class ProductTest extends \PHPUnit_Framework_TestCase
{
    public function goodDataProvider()
    {
        return array (
            array (
                array (
                    'productId'   => 1,
                    'code'        => 'TR0295',
                    'title'       => 'Box of 250 paperclips',
                    'description' => 'A resealable box with 250 paperclips',
                    'image'       => 'http://www.example.com/img/tr-0295.jpg',
                    'price'       => 4.95,
                    'created'     => '2012-09-23 09:12:48',
                    'modified'    => '2012-09-23 09:12:48',
                ),
            ),
            array (
                array (
                    'productId'   => 2,
                    'code'        => 'TR0666',
                    'title'       => 'Office Warfare multi-shot canon',
                    'description' => 'USB-powered canon with 4 barrels',
                    'image'       => 'http://www.example.com/img/tr-0666.jpg',
                    'price'       => 120,
                    'created'     => '2012-09-24 08:59:22',
                    'modified'    => '2012-09-25 10:50:31',
                ),
            ),
            array (
                array (
                    'productId'   => 3,
                    'code'        => 'TR0666',
                    'title'       => 'Office Warfare multi-shot canon',
                    'description' => 'USB-powered canon with 4 barrels',
                    'image'       => 'http://www.example.com/img/tr-0666.jpg',
                    'price'       => 120,
                    'created'     => '2012-09-24 08:59:22',
                    'modified'    => '2012-09-25 10:50:31'
                ),
            ),
            array (
                array (
                    'productId'   => 2,
                    'code'        => 'TR0666',
                    'title'       => 'Office Warfare multi-shot canon',
                    'description' => 'USB-powered canon with 4 barrels',
                    'image'       => 'http://www.example.com/img/tr-0666.jpg',
                    'price'       => 120,
                    'created'     => '2012-09-24 08:59:22',
                    'modified'    => '2012-09-25 10:50:31',
                ),
            ),
        );
    }

    /**
     * @dataProvider goodDataProvider
     */
    public function testProductModelCanBePopulated($data)
    {
        $product = new Product($data);

        $this->assertTrue($product->isValid(),
            'Expected this Product to be valid');
        $this->assertEquals($data['productId'], $product->getProductId(),
            'Provisioning of productId failed');
        $this->assertEquals($data['code'], $product->getCode(),
            'Provisioning of code failed');
        $this->assertEquals($data['title'], $product->getTitle(),
            'Provisioning of title failed');
        $this->assertEquals($data['description'], $product->getDescription(),
            'Provisioning of description failed');
        $this->assertEquals($data['price'], $product->getPrice(),
            'Provisioning of price failed');
        $this->assertEquals($data['created'], $product->getCreated()->format('Y-m-d H:i:s'),
            'Provisioning of created failed');
        $this->assertEquals($data['modified'], $product->getModified()->format('Y-m-d H:i:s'),
            'Provisioning of modified failed');
        $this->assertEquals($data, $product->toArray(),
            'Converting this model to array failed');

    }
}