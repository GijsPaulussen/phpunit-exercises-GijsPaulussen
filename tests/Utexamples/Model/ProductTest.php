<?php
namespace Utexamples\Model;
/**
 * Class ProductTest
 * @package Utexamples\Model
 * @group Model
 */
class ProductTest extends \PHPUnit_Framework_TestCase
{
    public function goodDataProvider() {
        return array (
            array (
                1,
                'TSTPROD1',
                'Test Product 1',
                'This is a full description of test product 1',
                'image.png',
                123.95,
                '2013-11-20 16:00:00',
                '2013-11-20 17:00:00',
            ),
            array (
                2,
                'TSTPROD2',
                'Test Product 2',
                'This is a full description of test product 2',
                'image.png',
                4125.99,
                '2013-11-20 16:00:00',
                '2013-11-20 17:00:00',
            ),
        );
    }

    public function testDatesAreSetAtConstruct()
    {
        $product = new Product();
        $this->assertNotNull($product->getCreated());
        $this->assertNotNull($product->getModified());
    }

    /**
     * @dataProvider goodDataProvider
     */
    public function testProductCanBePopulated(
        $productId, $code, $title, $description, $image, $price, $created, $modified
    )
    {
        $data = array (
            'productId' => $productId,
            'code' => $code,
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'price' => $price,
            'created' => $created,
            'modified' => $modified,
        );

        $product = new Product($data);
        $this->assertEquals($data, $product->toArray());
    }

    public function badDataProvider()
    {
        return array (
            array (
                1,
                '',
                '',
                '',
                '',
                0,
                '0000-00-00 00:00:00',
                '0000-00-00 00:00:00',
            ),
            array (
                1,
                '!@#$%^@^&*{}[]=-/\'\\',
                'Test Product 1',
                'This is a full description of test product 1',
                'image.png',
                123.95,
                '2013-11-20 16:00:00',
                '2013-11-20 17:00:00',
            ),
            array (
                1,
                '\' OR 1=1; --',
                'Test Product 1',
                'This is a full description of test product 1',
                'image.png',
                123.95,
                '2013-11-20 16:00:00',
                '2013-11-20 17:00:00',
            ),
        );
    }

    /**
     * @dataProvider badDataProvider
     */
    public function testProductRejectsBadData(
        $productId, $code, $title, $description, $image, $price, $created, $modified
    )
    {
        $data = array (
            'productId' => $productId,
            'code' => $code,
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'price' => $price,
            'created' => $created,
            'modified' => $modified,
        );

        $product = new Product($data);
        $this->assertFalse($product->isValid());
    }
}