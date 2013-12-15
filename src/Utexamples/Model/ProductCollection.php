<?php
namespace Utexamples\Model;
class ProductCollection extends ModelCollection
{
    protected $_pdo;

    /**
     * Sets the \PDO connection
     *
     * @param \PDO $pdo
     * @return ProductCollection
     */
    public function setPdo(\PDO $pdo)
    {
        $this->_pdo = $pdo;
        return $this;
    }

    /**
     * Retrieves the PDO connection
     *
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->_pdo;
    }

    /**
     * Fetch all product entities and add them to this collection
     */
    public function fetchAll()
    {
        $stmt = $this->getPdo()->prepare('SELECT * FROM `product`');
        $stmt->execute();
        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $this->addEntity(new Product($row));
        }
    }
}