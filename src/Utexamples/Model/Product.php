<?php
namespace Utexamples\Model;

class Product extends ModelAbstract
{
    /**
     * @var int The sequence ID for this product
     */
    protected $_productId;
    /**
     * @var string The product code
     */
    protected $_code;
    /**
     * @var string A descriptive title for this product
     */
    protected $_title;
    /**
     * @var string A detailed description for this product
     */
    protected $_description;
    /**
     * @var string The path to an image
     */
    protected $_image;
    /**
     * @var float The price for this Product
     */
    protected $_price;

    /**
     * Set the product code for this Product
     *
     * @param string $code
     * @return Product
     */
    public function setCode($code)
    {
        $this->_code = $code;
        return $this;
    }

    /**
     * Retrieve the code from this Product
     *
     * @return string
     */
    public function getCode()
    {
        return $this->_code;
    }

    /**
     * Sets the full description for this Product
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->_description = $description;
        return $this;
    }

    /**
     * Retrieve the full description from this Product
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * Sets the image for this Product
     *
     * @param string $image
     * @return Product
     */
    public function setImage($image)
    {
        $this->_image = $image;
        return $this;
    }

    /**
     * Retrieves the image from this Product
     *
     * @return string
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * Sets the price for this Product
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->_price = $price;
        return $this;
    }

    /**
     * Retrieves the price from this Product
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * Sets the product sequence ID for this Product
     *
     * @param int $productId
     * @return Product
     */
    public function setProductId($productId)
    {
        $this->_productId = $productId;
        return $this;
    }

    /**
     * Return the product sequence ID from this Product
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->_productId;
    }

    /**
     * Sets the title for this Product
     *
     * @param string $title
     * @return Product
     */
    public function setTitle($title)
    {
        $this->_title = $title;
        return $this;
    }

    /**
     * Retrieves the title from this Product
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * Populates the Model with data
     *
     * @param array|\StdClass $row
     * @return void
     */
    public function populate($row)
    {
        if (is_array($row)) {
            $row = new \ArrayObject($row, \ArrayObject::ARRAY_AS_PROPS);
        }
        $this->_safeSet($row, 'productId', 'setProductId')
            ->_safeSet($row, 'code', 'setCode')
            ->_safeSet($row, 'title', 'setTitle')
            ->_safeSet($row, 'description', 'setDescription')
            ->_safeSet($row, 'image', 'setImage')
            ->_safeSet($row, 'price', 'setPrice');
    }

    /**
     * Converts this Model into an array
     *
     * @return array
     */
    public function toArray()
    {
        return array (
            'productId' => $this->getProductId(),
            'code' => $this->getCode(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'image' => $this->getImage(),
            'price' => $this->getPrice(),
        );
    }
}