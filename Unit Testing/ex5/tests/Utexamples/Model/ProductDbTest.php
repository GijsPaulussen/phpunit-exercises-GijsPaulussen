<?php

namespace Utexamples\Model;

use PHPUnit_Extensions_Database_DataSet_IDataSet;
use PHPUnit_Extensions_Database_DB_IDatabaseConnection;
use PHPUnit_Extensions_Database_DataSet_QueryDataSet;

/**
 * Class ProductDbTest
 * @package Utexamples\Model
 *
 * @group DBTest
 */
class ProductDbTest extends \PHPUnit_Extensions_Database_TestCase
{
    protected $_pdo;

    public function __construct()
    {
        $this->_pdo = new \PDO('sqlite::memory:');
        $this->_pdo->exec(
            file_get_contents(
                dirname(__DIR__) . '/../../data/schema.sqlite.sql'
            )
        );
    }
    /**
     * Returns the test database connection.
     *
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    final public function getConnection()
    {
        return $this->createDefaultDBConnection(
            $this->_pdo, 'sqlite'
        );
    }

    /**
     * Returns the test dataset.
     *
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataSet()
    {
        return $this->createFlatXMLDataSet(
            dirname(__DIR__) . '/_files/initialDataSet.xml'
        );
    }

    public function testProductsCanBeLoadedFromDatabase()
    {
        $currentDataset = $this->getDataSet();

        $expectedDataset = $this->createFlatXmlDataSet(
            dirname(__DIR__) . '/_files/selectDataSet.xml'
        );

        $this->assertDataSetsEqual($expectedDataset, $currentDataset,
            'Data is not matching our initial state');
    }

    public function testProductAddToDatabase()
    {
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
        $productMapper = new ProductMapper($this->_pdo);
        $productMapper->save($product);

        $expectedDs = $this->createFlatXMLDataSet(
            dirname(__DIR__) . '/_files/addProductDataSet.xml'
        );
        $currentDs = $this->getConnection()->createDataSet(array ('product'));
        $this->assertDataSetsEqual($expectedDs, $currentDs,
            'Product was not added correctly');
    }
}
