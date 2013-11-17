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
     * @var \DateTime The creation date and time for this Product
     */
    protected $_created;
    /**
     * @var \DateTime The modification date and time for this Product
     */
    protected $_modified;
    /**
     * @var \Zend_Filter_Input The filter/validator for this Product
     */
    protected $_inputFilter;

    /**
     * Constructor for this Product
     *
     * @param null | array | \StdClass $params
     * @see ModelAbstract
     */
    public function __construct($params = null)
    {
        $this->_createInputFilter();
        parent::__construct($params);
    }

    /**
     * Helper class to create filter and validation rules
     *
     * @access protected
     */
    protected function _createInputFilter()
    {
        $filters = array (
            'productId' => array('Int'),
            'code' => array ('StripTags', 'StringTrim', 'StringToUpper'),
            'title' => array ('StripTags', 'StringTrim'),
            'description' => array ('StripTags', 'StringTrim'),
            'image' => array ('StripTags', 'StringTrim','StringToLower'),
            'price' => array (),
        );
        $validators = array (
            'productId' => array (
                'Int',
                array ('GreaterThan', array ('min' => 0, 'inclusive' => true)),
            ),
            'code' => array (
                'Alnum',
                array ('StringLength', array ('min' => 5, 'max' => 50)),
            ),
            'title' => array ('NotEmpty'),
            'description' => array ('NotEmpty'),
            'image' => array ('NotEmpty'),
            'price' => array (
                'Float',
                array ('GreaterThan', array ('min' => 0, 'inclusive' => true)),
            ),
        );
        $this->_inputFilter = new \Zend_Filter_Input($filters, $validators);
    }
    /**
     * Set the product code for this Product
     *
     * @param string $code
     * @return Product
     */
    public function setCode($code)
    {
        $this->_inputFilter->setData(array ('code' => $code));
        if ($this->_inputFilter->isValid('code')) {
            $this->_code = $this->_inputFilter->code;
        }
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
        $this->_inputFilter->setData(array ('description' => $description));
        if ($this->_inputFilter->isValid('description')) {
            $this->_description = $this->_inputFilter->description;
        }
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
        $this->_inputFilter->setData(array ('image' => $image));
        if ($this->_inputFilter->isValid('image')) {
            $this->_image = $this->_inputFilter->image;
        }
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
        $this->_inputFilter->setData(array ('price' => $price));
        if ($this->_inputFilter->isValid('price')) {
            $this->_price = $this->_inputFilter->price;
        }
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
        $this->_inputFilter->setData(array ('productId' => $productId));
        if ($this->_inputFilter->isValid('productId')) {
            $this->_productId = (int) $this->_inputFilter->productId;
        }
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
        $this->_inputFilter->setData(array ('title' => $title));
        if ($this->_inputFilter->isValid('title')) {
            $this->_title = $this->_inputFilter->title;
        }
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
     * Set the creation date for this Product
     *
     * @param string | \DateTime $created
     * @return Product
     */
    public function setCreated($created)
    {
        if (!$created instanceof \DateTime) {
            $created = new \DateTime($created);
        }
        $this->_created = $created;
        return $this;
    }

    /**
     * Retrievest the creation date from this Product
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        if (null === $this->_created) {
            $this->setCreated(new \DateTime());
        }
        return $this->_created;
    }

    /**
     * Sets the modification date for this Product
     *
     * @param string | \DateTime $modified
     * @return Product
     */
    public function setModified($modified)
    {
        if (!$modified instanceof \DateTime) {
            $modified = new \DateTime($modified);
        }
        $this->_modified = $modified;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getModified()
    {
        if (null === $this->_modified) {
            $this->setModified(new \DateTime());
        }
        return $this->_modified;
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
            ->_safeSet($row, 'price', 'setPrice')
            ->_safeSet($row, 'created', 'setCreated')
            ->_safeSet($row, 'modified', 'setModified');
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
            'created' => $this->getCreated()->format('Y-m-d H:i:s'),
            'modified' => $this->getModified()->format('Y-m-d H:i:s'),
        );
    }
}