<?php
namespace Utexamples\Model;

class Product
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
     * @var \Zend_Filter_Input The input filter component of Zend Framework
     */
    protected $_inputFilter;

    /**
     * Constructor for this Product model, allows us to provision
     * this model with optional data
     *
     * @param null|array $params Optional data
     */
    public function __construct($params = null)
    {
        if (null !== $params) {
            $this->populate($params);
        }
    }
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
        $this->_price = (float) $price;
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
        $this->_productId = (int) $productId;
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
        $this->_title = (string) $title;
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
            'productId'   => $this->getProductId(),
            'code'        => $this->getCode(),
            'title'       => $this->getTitle(),
            'description' => $this->getDescription(),
            'image'       => $this->getImage(),
            'price'       => $this->getPrice(),
            'created'     => $this->getCreated()->format('Y-m-d H:i:s'),
            'modified'    => $this->getModified()->format('Y-m-d H:i:s'),
        );
    }

    /**
     * Sets the input filter for this Product
     *
     * @param \Zend_Filter_Input $inputFilter
     * @return Product
     */
    public function setInputFilter(\Zend_Filter_Input $inputFilter)
    {
        $this->_inputFilter = $inputFilter;
        return $this;
    }

    /**
     * Retrieves the input filter from this Product
     *
     * @return \Zend_Filter_Input
     */
    public function getInputFilter()
    {
        if (null === $this->_initInputFilter()) {
            $this->_initInputFilter();
        }
        return $this->_inputFilter;
    }

    /**
     * Creates a default input filter and validator for this Product
     */
    protected function _initInputFilter()
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
                array ('StringLength', array ('min' => 2, 'max' => 50)),
            ),
            'title' => array ('NotEmpty'),
            'description' => array ('NotEmpty'),
            'image' => array ('NotEmpty'),
            'price' => array (
                'Float',
                array ('GreaterThan', array ('min' => 0, 'inclusive' => true)),
            ),
        );
        $this->setInputFilter(new \Zend_Filter_Input($filters, $validators));
    }

    /**
     * Security sets values into the using proper methods
     *
     * @param \ArrayObject $data The row element containing the data
     * @param string $key The key element which we would like to validate
     * @param string $method The method that is used to set te data in the model
     * @return Product
     * @throws \RuntimeException
     */
    protected function _safeSet($data, $key, $method)
    {
        if (isset ($data->$key)) {
            if (!method_exists($this, $method)) {
                throw new \RuntimeException(
                    'Invalid method specified: ' . $method
                );
            }
            $this->$method($data->$key);
        }
        return $this;
    }

    /**
     * Validation of the data in our model
     *
     * @return bool
     */
    public function isValid()
    {
        $this->getInputFilter()->setData($this->toArray());
        $result = $this->getInputFilter()->isValid();
        $this->populate($this->getInputFilter()->getEscaped());
        return $result;
    }
}
