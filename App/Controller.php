<?php

namespace App;

/**
 * Class Controller
 * @package App
 */
abstract class Controller
{
    protected $view;

    use MagicTrait;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        if ($this->access()) {
            return $this->handle();
        }
        die('Access closed');
    }

    /**
     * @return bool
     */
    protected function access(): bool
    {
        return true;
    }

    /**
     * @return mixed
     */
    abstract protected function handle();

    /**
     * @param string $path
     */
    protected function redirect(string $path)
    {
        header('Location: ' . $path);
        exit;
    }
}
