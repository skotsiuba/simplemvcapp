<?php

namespace App;

/**
 * Trait IteratorTrait
 * @package App
 */
trait IteratorTrait
{

    protected $data = [];

    /**
     * Return the current element
     * @return mixed Can return any type.
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * Move forward to next element
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        next($this->data);
    }

    /**
     * Return the key of the current element
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * Checks if current position is valid
     * @return boolean
     */
    public function valid()
    {
        return null !== key($this->data);
    }

    /**
     * Rewind the Iterator to the first element
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        reset($this->data);
    }
}
