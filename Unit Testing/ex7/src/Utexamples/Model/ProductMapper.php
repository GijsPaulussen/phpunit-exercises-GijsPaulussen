<?php

namespace Utexamples\Model;

class ProductMapper
{
    /**
     * @var \PDO The database connection settings
     */
    protected $_pdo;

    public function __construct($pdo = null)
    {
        if (null !== $pdo) {
            $this->setPdo($pdo);
        }
    }

    /**
     * @param \PDO $pdo
     * @return ProductMapper
     */
    public function setPdo(\PDO $pdo)
    {
        $this->_pdo = $pdo;
        return $this;
    }

    /**
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->_pdo;
    }

    /**
     * Saves a given Product into data storage
     *
     * @param Product $product
     */
    public function save(Product $product)
    {
        $data = $product->toArray();
        if (0 < $product->getProductId()) {
            $stmt = $this->getPdo()->prepare(
                'UPDATE `product` SET
                    `code` = ?,
                    `title` = ?,
                    `description` = ?,
                    `image` = ?,
                    `price` = ?,
                    `created` = ?,
                    `modified` = ?,
                    WHERE `productId` = ?'
            );
            $stmt->bindParam(1, $data['code'], \PDO::PARAM_STR);
            $stmt->bindParam(2, $data['title'], \PDO::PARAM_STR);
            $stmt->bindParam(3, $data['description'], \PDO::PARAM_STR);
            $stmt->bindParam(4, $data['image'], \PDO::PARAM_STR);
            $stmt->bindParam(5, $data['price'], \PDO::PARAM_STR);
            $stmt->bindParam(6, $data['created'], \PDO::PARAM_STR);
            $stmt->bindParam(7, $data['modified'], \PDO::PARAM_STR);
            $stmt->bindParam(8, $data['productId'], \PDO::PARAM_INT);

            $stmt->execute();
        } else {
            $stmt = $this->getPdo()->prepare(
                'INSERT INTO `product` VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
            );
            $stmt->bindParam(1, $data['productId'], \PDO::PARAM_INT);
            $stmt->bindParam(2, $data['code'], \PDO::PARAM_STR);
            $stmt->bindParam(3, $data['title'], \PDO::PARAM_STR);
            $stmt->bindParam(4, $data['description'], \PDO::PARAM_STR);
            $stmt->bindParam(5, $data['image'], \PDO::PARAM_STR);
            $stmt->bindParam(6, $data['price'], \PDO::PARAM_STR);
            $stmt->bindParam(7, $data['created'], \PDO::PARAM_STR);
            $stmt->bindParam(8, $data['modified'], \PDO::PARAM_STR);
            $stmt->execute();
        }
    }

}