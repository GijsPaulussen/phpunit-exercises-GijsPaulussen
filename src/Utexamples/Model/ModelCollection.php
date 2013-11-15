<?php
namespace Utexamples\Model;
abstract class ModelCollection implements \Countable, \SeekableIterator
{
    /**
     * @var array List of elements in this Collection
     */
    protected $_list;
    /**
     * @var int The total of elements in this Collection
     */
    protected $_count;
    /**
     * @var int The current position of the pointer in this Collection
     */
    protected $_position;

    public function __construct()
    {
        $this->_position = 0;
        $this->_count = 0;
        $this->_list = array ();
    }
    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        return $this->_list[$this->_position];
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        $this->_position++;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return $this->_position;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return isset ($this->_list[$this->_position]);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return ModelCollection
     */
    public function rewind()
    {
        $this->_position = 0;
        return $this;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     */
    public function count()
    {
        return $this->_count;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Seeks to a position
     * @link http://php.net/manual/en/seekableiterator.seek.php
     * @param int $position The position to seek to.
     * @return ModelCollection
     */
    public function seek($position)
    {
        $this->_position = $position;
        if (!$this->valid()) {
            throw new \OutOfBoundsException('Invalid position provided');
        }
        return $this;
    }

    /**
     * Adds an entity to this Collection
     *
     * @param mixed $entity The entity that needs to be added
     * @return ModelCollection
     */
    public function addEntity($entity)
    {
        $this->_list[] = $entity;
        $this->_count++;
        return $this;
    }
}