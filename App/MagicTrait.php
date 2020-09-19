<?php

namespace App;

/**
 * Trait MagicTrait
 * @package App
 */
trait MagicTrait
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param $name string
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    /**
     * @param $name string
     * @param $value mixed
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $name string
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * @param $name string
     */
    public function __unset($name)
    {
        unset($this->data[$name]);
    }
}
