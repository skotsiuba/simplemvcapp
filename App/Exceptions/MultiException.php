<?php

namespace App\Exceptions;

/**
 * Class MultiException
 * @package App\Exceptions
 */
class MultiException extends BaseException
{
    protected $errors = [];

    /**
     * @param BaseException $e object
     */
    public function add(BaseException $e)
    {
        $this->errors[] = $e;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->errors;
    }

    /**
     * @return bool
     */
    public function empty()
    {
        return empty($this->errors);
    }
}
