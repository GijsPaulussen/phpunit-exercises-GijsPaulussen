<?php
namespace Utexamples\Model;
interface ModelInterface
{
    /**
     * Populates the Model with data
     *
     * @param array|\StdClass $row
     * @return void
     */
    public function populate($row);

    /**
     * Converts this Model into an array
     *
     * @return array
     */
    public function toArray();

    /**
     * Converts this Model to a string
     *
     * @return string
     */
    public function __toString();
}