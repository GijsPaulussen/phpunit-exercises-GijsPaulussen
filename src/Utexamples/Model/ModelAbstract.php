<?php
namespace Utexamples\Model;
abstract class ModelAbstract implements ModelInterface
{
    /**
     * @var \PDO The connection to the database
     */
    protected $_pdo;
    /**
     * Constructor for this class
     *
     * @param null|array|StdObj $params
     */
    public function __construct($params = null)
    {
        if (null !== $params) {
            $this->populate($params);
        }
    }

    /**
     * Sets the database connection
     *
     * @param \PDO
     */
    public function setPdo(\PDO $pdo)
    {
        $this->_pdo = $pdo;
        return $this;
    }

    /**
     * Retrieves the database connection
     */
    public function getPdo()
    {
        return $this->_pdo;
    }

    /**
     * Converts this object into a JSON encoded string
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->toArray());
    }

    /**
     * Security sets values into the using proper methods
     *
     * @param $data The row element containing the data
     * @param $key The key element which we would like to validate
     * @param $method The method that is used to set te data in the model
     * @return ModelAbstract
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
}
